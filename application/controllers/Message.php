<?php
class Message extends CI_controller
{
	public function index()
	{
		$this->load->model('Messagemodel');
		if (isset($_SESSION['image'])) {

			$data['data'] = $this->ownerDetailsuser();
			$this->load->view('message/message', $data);
		} else {
			$this->load->view('error/error');
		}
	}
	public function ownerDetails()
	{
		$res = $this->ownerDetailsuser();
		print_r(json_encode($res));
	}
	public function allUser()
	{
		$data['data'] = $this->allUseruser();
		$data['last_msg'] = array();
		$this->load->helper('url');
		if (!is_array($data['data'])) {
			echo "<p class='text-center'>No user available.</p>";
		} else {
			$count = count($data['data']);
			for ($i = 0; $i < $count; $i++) {
				$unique_id = $data['data'][$i]['unique_id'];
				$msg = $this->getLastMessageuser($unique_id);
				for ($j = 0; $j < count($msg); $j++) {

					$time = explode(" ", $msg[0]['time']); //00:00:00.0000
					$time = explode(".", $time[1]); //00:00:00
					$time = explode(":", $time[0]); //00 00 00
					if ((int)$time[0] == 12) {
						$time = $time[0] . ":" . $time[1] . " PM";
					} elseif ((int)$time[0] > 12) {
						$time = ($time[0] - 12) . ":" . $time[1] . " PM";
					} else {
						$time = $time[0] . ":" . $time[1] . " AM";
					}

					array_push($data['last_msg'], array(
						'message' => $msg[0]['message'],
						'sender_id' => $msg[0]['sender_message_id'],
						'receiver_id' => $msg[0]['receiver_message_id'],
						'time' => $time //00:00
					));
				}
			}
			$this->load->view('message/sampleDataShow', $data);
		}
	}
	public function getIndividual()
	{
		$returnVal = $this->getIndividualuser($_POST['data']);
		print_r(json_encode($returnVal, true));
	}
	public function logout()
	{
		$date = $_POST['date'];
		$this->load->helper('url');
		$this->logoutUseruser('deactive', $date);
		unset(
			$_SESSION['uniqueid'],
			$_SESSION['username'],
			$_SESSION['image'],
		);
		echo base_url();
	}
	public function setNoMessage()
	{
		$data['image'] = $_POST['image'];
		$data['name'] = $_POST['name'];
		$this->load->view('message/notmessageyet', $data);
	}
	public function sendMessage()
	{
		if (isset($_POST['data']) && isset($_SESSION['uniqueid'])) {
			$jsonDecode = json_decode($_POST['data'], true);
			$uniq = $_SESSION['uniqueid'];
			$arr = array(
				'time' => $jsonDecode['datetime'],
				'sender_message_id' => $uniq,
				'receiver_message_id' => $jsonDecode['uniq'],
				'message' => $jsonDecode['message'],
			);
			$this->sentMessageuser($arr);
		}
	}
	public function getMessage()
	{
		if (isset($_POST['data']) && isset($_SESSION['uniqueid'])) {
			$data['data'] = $this->getmessageuser($_POST['data']);
			$data['image'] = $_POST['image'];
			$this->load->view('message/sampleMessageShow', $data);
		}
	}
	public function updateBio()
	{
		if ($_POST) {
			$this->updateBiouser($_POST);
		}
	}
	public function blockUser()
	{
		if (isset($_POST['time']) && isset($_POST['uniq'])) {
			$arr = array(
				'blocked_from' => $_SESSION['uniqueid'],
				'blocked_to' => $_POST['uniq'],
				'time' => $_POST['time']
			);
			$this->blockUseruser($arr);
			return 1;
		}
	}
	public function getBlockUserData()
	{
		if (isset($_POST['uniq'])) {
			$res = $this->getBlockUserDatauser($_POST['uniq'], $_SESSION['uniqueid']);
			print_r(json_encode($res));
		}
	}
	public function unBlockUser()
	{
		if (isset($_POST['uniq'])) {
			$from = $_SESSION['uniqueid'];
			$to = $_POST['uniq'];
			$this->unBlockUseruser($from, $to);
		}
	}
	//
	public function ownerDetailsuser()
	{
		if (isset($_SESSION['uniqueid'])) {
			$this->db->select('*');
			$this->db->where('unique_id', $_SESSION['uniqueid']);
			$res = $this->db->get('user')->result_array();
			return $res;
		}
	}
	public function allUseruser()
	{
		if (isset($_SESSION['uniqueid'])) {
			$mysession = $_SESSION['uniqueid'];
			$this->db->select('*');
			$this->db->where('unique_id != ', $mysession);
			$data = $this->db->get('user');
			if ($data->num_rows() > 0) {
				return $data->result_array();
			} else {
				return false;
			}
		}
	}
	public function logoutUseruser($status, $date)
	{
		if (isset($_SESSION['uniqueid'])) {
			$currentSession = $_SESSION['uniqueid'];
			$this->db->query("UPDATE user SET user_status = '$status' , last_logout = '$date' WHERE 
			unique_id = '$currentSession'");
		}
	}
	public function sentMessageuser($data)
	{
		$this->db->insert('user_messages', $data);
	}
	public function getmessageuser($data)
	{
		$this->db->select('*');
		$session_id = $_SESSION['uniqueid'];
		$where = "sender_message_id = '$session_id' AND receiver_message_id = '$data' OR 
		sender_message_id = '$data' AND receiver_message_id = '$session_id'";
		$this->db->where($where);
		// $this->db->order_by('time', 'ASC');
		$result = $this->db->get('user_messages')->result_array();
		return $result;
	}
	public function getLastMessageuser($data)
	{
		$this->db->select('*');
		$session_id = $_SESSION['uniqueid'];
		$where = "sender_message_id = '$session_id' AND receiver_message_id = '$data' OR 
		sender_message_id = '$data' AND receiver_message_id = '$session_id'";
		$this->db->where($where);
		$this->db->order_by('time', 'DESC');
		$result = $this->db->get('user_messages', 1)->result_array();
		return $result;
	}
	public function getIndividualuser($id)
	{
		$this->db->select('*');
		$this->db->where('unique_id', $id);
		$res = $this->db->get('user')->result_array();
		return $res;
	}
	public function updateBiouser($data)
	{
		if (isset($_SESSION['uniqueid'])) {
			$session_id = $_SESSION['uniqueid'];
			$bio = $data['bio'];
			$dob = $data['dob'];
			$address = $data['address'];
			$phone = $data['phone'];

			$this->db->query("UPDATE user SET bio = '$bio', dob = '$dob', address = '$address', phone = '$phone' WHERE unique_id = '$session_id'");
			// return $data;
		}
	}
	public function blockUseruser($arr)
	{
		$this->db->insert('block_user', $arr);
	}
	public function unBlockUseruser($val1, $val2)
	{
		$this->db->query("DELETE FROM block_user WHERE blocked_from = '$val1' AND blocked_to = '$val2'");
	}
	public function getBlockUserDatauser($val1, $val2)
	{
		$this->db->select('*');
		$where = "blocked_from = '$val1' AND blocked_to = '$val2' OR blocked_from = '$val2' AND blocked_to = '$val1'";
		$this->db->where($where);
		$res = $this->db->get('block_user')->result_array();

		return $res;
	}
}
