<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $mitra = $this->session->userdata('mitra');
        if (empty($mitra)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'login/mitra');
        }
        $this->load->model('Order_model');
        $this->load->model('Store_model');
        $this->load->model('Premium_model');
    }
    public function index()
    {
        $mitra = $this->session->userdata('mitra');
        $order = $this->Order_model->getUserOrder($mitra['mitra_id']);
        $data['orders'] = $order;
        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/orders', $data);
        $this->load->view('mitra/partials/footer');
    }

    public function deleteOrder($id)
    {
        $order = $this->Order_model->getOrder($id);

        if (empty($order)) {
            $this->session->set_flashdata('error_msg', 'Order not found');
            redirect(base_url() . 'mitra/orders');
        }

        $this->Order_model->deleteOrder($id);

        $this->session->set_flashdata('success_msg', 'Your order cancelled successfully');
        redirect(base_url() . 'mitra/orders');
    }


    public function invoice($id)
    {
        $order = $this->Order_model->getOrderByUser($id);
        $data['order'] = $order;
        $mitra_id = $order['mitra_id'];
        $p_id = $order['p_id'];
        $premium = $this->Premium_model->getSinglepremium($p_id);
        $data['premium'] = $premium;

        $mitra = $this->session->userdata('mitra');
        if ($mitra_id == $mitra['mitra_id']) {
            if ($order['status'] == 'closed') {
                $this->load->view('mitra/invoice', $data);
            } else {
                $this->session->set_flashdata('error_msg', 'your order is not yet complete');
                redirect(base_url() . 'mitra/orders');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'you are accessing wrong order data');
            redirect(base_url() . 'mitra/orders');
        }
    }
}
