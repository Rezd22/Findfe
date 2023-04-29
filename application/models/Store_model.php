<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Store_model extends CI_Model
{

    public function create($formArray)
    {
        $this->db->insert('toko', $formArray);
    }

    public function getStores()
    {
        $result = $this->db->get('toko')->result_array();
        return $result;
    }

    public function getStore($id)
    {
        $this->db->where('r_id', $id);
        $store = $this->db->get('toko')->row_array();
        return $store;
    }

    public function update($id, $formArray)
    {
        $this->db->where('r_id', $id);
        $this->db->update('toko', $formArray);
    }

    public function delete($id)
    {
        $this->db->where('r_id', $id);
        $this->db->delete('toko');
    }

    public function countStore()
    {
        $query = $this->db->get('toko');
        return $query->num_rows();
    }

    public function getResInfo()
    {
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->join('res_category', 'toko.c_id = res_category.c_id');
        $result = $this->db->get()->result_array();
        return $result;
    }
}
