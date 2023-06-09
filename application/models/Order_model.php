<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{

    public function getOrders()
    {
        $this->db->order_by('o_id', 'DESC');
        $result = $this->db->get('user_orders')->result_array();
        return $result;
    }

    public function getOrder($id)
    {
        $this->db->where('o_id', $id);
        $result = $this->db->get('user_orders')->row_array();
        return $result;
    }

    public function getUserOrder($id)
    {
        $this->db->where('mitra_id', $id);
        $this->db->order_by('o_id', 'DESC');
        $result = $this->db->get('user_orders')->result_array();
        return $result;
    }

    public function update($id, $status)
    {
        $this->db->where('o_id', $id);
        $this->db->update('user_orders', $status);
    }

    public function deleteOrder($id)
    {
        $this->db->where('o_id', $id);
        $this->db->delete('user_orders');
    }

    public function insertOrder($orderData)
    {
        $this->db->insert_batch('user_orders', $orderData);
        return $this->db->insert_id();
    }

    public function countOrders()
    {
        $query = $this->db->get('user_orders');
        return $query->num_rows();
    }

    public function countPendingOrders()
    {
        $this->db->where('status', NULL);
        $query = $this->db->get('user_orders');
        return $query->num_rows();
    }

    public function countDeliveredOrders()
    {
        $this->db->where('status', 'closed');
        $query = $this->db->get('user_orders');
        return $query->num_rows();
    }

    public function countRejectedOrders()
    {
        $this->db->where('status', 'rejected');
        $query = $this->db->get('user_orders');
        return $query->num_rows();
    }

    public function getAllOrders()
    {
        $this->db->order_by('o_id', 'DESC');
        $this->db->select('o_id,name, quantity, price, status, username');
        $this->db->from('user_orders');
        $this->db->join('mitra', 'mitra.mitra_id = user_orders.mitra_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOrderByUser($id)
    {
        $this->db->select('o_id, p_id, mitra.mitra_id,name, quantity, price, status, user_orders.date, mitra.email,  success-date, username');
        $this->db->from('user_orders');
        $this->db->join('mitra', 'mitra.mitra_id = user_orders.mitra_id');
        $this->db->where('o_id', $id);
        $result = $this->db->get()->row_array();
        return $result;
    }
}
