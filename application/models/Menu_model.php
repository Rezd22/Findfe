<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function create($formArray)
    {
        $this->db->insert('kopiesh', $formArray);
    }

    public function getMenu()
    {
        $result = $this->db->get('kopiesh')->result_array();
        return $result;
    }

    public function getSinglekopi($id)
    {
        $this->db->where('d_id', $id);
        $kopi = $this->db->get('kopiesh')->row_array();
        return $kopi;
    }

    public function update($id, $formArray)
    {
        $this->db->where('d_id', $id);
        $this->db->update('kopiesh', $formArray);
    }

    public function delete($id)
    {
        $this->db->where('d_id', $id);
        $this->db->delete('kopiesh');
    }

    public function countkopi()
    {
        $query = $this->db->get('kopiesh');
        return $query->num_rows();
    }

    public function getkopiesh($id)
    {
        $this->db->where('r_id', $id);
        $kopi = $this->db->get('kopiesh')->result_array();
        return $kopi;
    }

    public function getkopieshall()
    {
        $kopi = $this->db->get('kopiesh')->result_array();
        return $kopi;
    }

    public function countstock()
    {
        $this->db->select('stock');
        $query = $this->db->get('kopiesh');
        return $query->result_array();
    }
    public function editstock($id, $stock)
    {
        $this->db->where('d_id', $id);
        $this->db->set('stock', $stock);
        $this->db->update('kopiesh');
    }
    public function addstock($formArray)
    {
        $this->db->insert('kopiesh', $formArray);
    }


    // p

}
