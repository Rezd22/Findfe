<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function get_comments()
    {
        return $this->db->where('parent_id', NULL)->get('comments')->result_array();
    }

    public function get_replies($comment_id)
    {
        return $this->db->where('parent_id', $comment_id)->get('comments')->result_array();
    }

    public function add_comment($content)
    {
        $data = array(
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('comments', $data);
    }

    public function add_reply($parent_id, $content)
    {
        $data = array(
            'parent_id' => $parent_id,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('comments', $data);
    }
    public function delete_comment($comment_id)
    {
        // Hapus komentar berdasarkan ID
        $this->db->where('id', $comment_id)->delete('comments');

        // Hapus juga balasan yang terkait dengan komentar yang dihapus
        $this->db->where('parent_id', $comment_id)->delete('comments');
    }
}
