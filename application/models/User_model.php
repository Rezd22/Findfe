<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function create($formArray)
    {
        $this->db->insert('users', $formArray);
    }

    public function getByUsername($username)
    {
        $this->db->where('username', $username);
        $mainuser = $this->db->get('users')->row_array();
        return $mainuser;
    }

    public function getUsers()
    {
        $result = $this->db->get('users')->result_array();
        return $result;
    }

    public function getUser($u_id)
    {
        $this->db->where('u_id', $u_id);
        $user = $this->db->get('users')->row_array();
        return $user;
    }

    public function update($u_id, $formArray)
    {
        $this->db->where('u_id', $u_id);
        $this->db->update('users', $formArray);
    }

    public function delete($u_id)
    {
        $this->db->where('u_id', $u_id);
        $this->db->delete('users');
    }

    public function countUser()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }
    private $User = 'users';





//     public function GetUserData()

//     {

//         $this->db->select('u_id,username,f_name,l_name,email,about,phone,address,picture_url');

//         $this->db->from($this->User);

//         $this->db->where("u_id", $this->session->userdata['Admin']['u_id']);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         if ($query) {

//             return $query->row_array();
//         } else {

//             return false;
//         }
//     }

//     public function IfExistEmail($email)
//     {



//         $this->db->select('u_id, email');

//         $this->db->from($this->User);

//         $this->db->where('email', $email);

//         $query = $this->db->get();

//         if ($query->num_rows() != 0) {

//             return $query->row_array();
//         } else {

//             return false;
//         }
//     }



//     public function PictureUrl()

//     {

//         $this->db->select('u_id,picture_url');

//         $this->db->from($this->User);

//         $this->db->where("u_id", $this->session->userdata['Admin']['u_id']);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         $res = $query->row_array();

//         if (!empty($res['picture_url'])) {

//             return base_url('uploads/profiles/' . $res['picture_url']);
//         } else {

//             return base_url('public/images/user-icon.jpg');
//         }
//     }

//     public function PictureUrlByid($u_id)

//     {

//         $this->db->select('u_id,picture_url');

//         $this->db->from($this->User);

//         $this->db->where("u_id", $u_id);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         $res = $query->row_array();

//         if (!empty($res['picture_url'])) {

//             return base_url('uploads/profiles/' . $res['picture_url']);
//         } else {

//             return base_url('public/images/user-icon.jpg');
//         }
//     }





//     public function GetName($u_id)

//     {

//         $this->db->select('u_id,username');

//         $this->db->from($this->User);

//         $this->db->where("u_id", $u_id);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         $res = $query->row_array();

//         return $res['name'];
//     }

//     public function Getu_idByName($username)

//     {

//         $this->db->select('u_id,username');

//         $this->db->from($this->User);

//         $this->db->where("username", $username);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         $res = $query->row_array();

//         return $res['u_id'];
//     }



//     public function GetUserAddress($u_id)

//     {

//         $this->db->select('u_id,username,f_name,l_name,email,about,phone,address,picture_url');

//         $this->db->from($this->User);

//         $this->db->where("u_id", $u_id);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         $res = $query->row_array();

//         return $res;
//     }









//     public function UpdateProfileImageByid($data)

//     {

//         $res = $this->db->update($this->User, $data, ['u_id' => $this->session->userdata['Admin']['u_id']]);

//         if ($res == 1)

//             return true;

//         else

//             return false;
//     }



//     public function UpdateCustomerProfileImageByid($data)

//     {

//         $res = $this->db->update($this->User, $data, ['u_id' => $this->session->userdata['User']['u_id']]);

//         if ($res == 1)

//             return true;

//         else

//             return false;
//     }



//     public function GetUserDataByid($u_id)

//     {

//         $this->db->select('u_id,username,f_name,l_name,email,phone');

//         $this->db->from($this->User);

//         $this->db->where("u_id", $u_id);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         if ($query) {

//             return $query->row_array();
//         } else {

//             return false;
//         }
//     }



//     public function GetMemberNameByid($u_id)

//     {

//         $this->db->select('u_id,username');

//         $this->db->from($this->User);

//         $this->db->where("u_id", $u_id);

//         $this->db->limit(1);

//         $query = $this->db->get();

//         $u = $query->row_array();

//         return $u['name'];
//     }



//     public function AddMember($data)

//     {

//         $res = $this->db->insert($this->User, $data);

//         if ($res == 1)

//             return $this->db->insert_u_id();

//         else

//             return false;
//     }







//     public function StatusUpdateByid($user_u_id, $status)

//     {



//         $res = $this->db->update($this->User, ['status' => $status], ['u_id' => $user_u_id]);

//         if ($res == 1)

//             return true;

//         else

//             return false;
//     }





//     public function TrashByid($user_u_id)

//     {



//         $res = $this->db->delete($this->User, ['u_id' => $user_u_id]);

//         if ($res == 1)

//             return true;

//         else

//             return false;
//     }





//     public function AllRoleTypes($role)

//     {

//         $this->db->select('u_id,username');

//         $this->db->from($this->User);

//         $this->db->where("role", $role);

//         $query = $this->db->get();

//         $u = $query->num_rows();

//         return $u;
//     }



//     public function VendorsList()

//     {

//         $this->db->select('u_id,username,picture_url');

//         $this->db->from($this->User);

//         $this->db->where("role", "Vendor");

//         $this->db->where("status", "1");

//         $query = $this->db->get();

//         $r = $query->result_array();

//         return $r;
//     }

//     public function ClientsListCs()

//     {

//         $this->db->select('u_id,username,picture_url');

//         $this->db->from($this->User);

//         $this->db->where("role", "Client_cs");

//         $this->db->where("status", "1");

//         $query = $this->db->get();

//         $r = $query->result_array();

//         return $r;
//     }
}
