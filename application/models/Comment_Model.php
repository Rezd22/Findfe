<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function get_ulasan()
    {
        return $this->db->where('ul_id')->get('ulasan')->result_array();
    }
    public function get_user()
    {
        return $this->session->userdata('user')['user_id'];
    }
    public function get_replies($comment_id)
    {
        return $this->db->where('ul_id', $comment_id)->get('ulasan')->result_array();
    }

    public function add_comment($u_id,$r_id, $content)
    {
        $data = array(

            'u_id' => $u_id,
            'r_id' => $r_id,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('ulasan', $data);
    }

    public function add_reply($u_id,$r_id, $content)
    {
        $data = array(
            'u_id' => $u_id,
            'r_id' => $r_id,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('ulasan', $data);
    }
    public function delete_comment($comment_id)
    {
        // Hapus komentar berdasarkan ID
        $this->db->where('ul_id', $comment_id)->delete('ulasan');

        // Hapus juga balasan yang terkait dengan komentar yang dihapus
        $this->db->where('u_id', $comment_id)->delete('ulasan');
    }
}
