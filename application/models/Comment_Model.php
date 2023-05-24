<?php
class Comment_model extends CI_Model
{
    public function create_comment($data)
    {
        $this->db->insert('comments', $data);
        return $this->db->insert_id();
    }

    public function get_comments_by_post($post_id)
    {
        $this->db->where('post_id', $post_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('comments')->result_array();
    }
    public function get_all_comments()
    {
        $query = $this->db->query("SELECT * FROM comments");
        return $query->result();
    }
}
