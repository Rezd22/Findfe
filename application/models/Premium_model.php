<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium_model extends CI_Model
{

    public function create($formArray)
    {
        $this->db->insert('premium', $formArray);
    }

    public function getpremiums()
    {
        $result = $this->db->get('premium')->result_array();
        return $result;
    }

    public function getSinglepremium($id)
    {
        $this->db->where('p_id', $id);
        $kopi = $this->db->get('premium')->row_array();
        return $kopi;
    }
    public function update($id, $formArray)
    {
        $this->db->where('p_id', $id);
        $this->db->update('premium', $formArray);
    }

    public function delete($id)
    {
        $this->db->where('p_id', $id);
        $this->db->delete('premium');
    }

    public function countpremium()
    {
        $query = $this->db->get('premium');
        return $query->num_rows();
    }

    public function getResInfo()
    {
        $this->db->select('*');
        $this->db->from('premium');
        // $this->db->join('res_category', 'premium.c_id = res_category.c_id');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_premiums($id)
    {
        $this->db->where('p_id', $id);
        $premium = $this->db->get('premium')->result_array();
        return $premium;
    }
    public function getpremiumall()
    {
        $premium = $this->db->get('premium')->result_array();
        return $premium;
    }
}
