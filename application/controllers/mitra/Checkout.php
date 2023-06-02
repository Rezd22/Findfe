<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $mitra = $this->session->userdata('mitra');
        if (empty($mitra)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'mitra/login/');
        }

        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->library('cart');
        $this->load->model('Order_model');
        $this->load->model('mitra_model');
        $this->controller = 'checkout';
    }

    public function index()
    {
        $loggedUser = $this->session->userdata('mitra');
        $mitra_id = $loggedUser['mitra_id'];
        $mitra = $this->mitra_model->getUser($mitra_id);

        if ($this->cart->total_items() <= 0) {
            redirect(base_url() . 'mitra/premium/list');
        }
        $submit = $this->input->post();
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');


        if ($submit) {


            //insert data into customer table and get last inserted custid
            // $this->mitra_model->update($mitra_id);
            $order = $this->placeOrder($mitra_id);
            if ($order) {
                $this->session->set_flashdata('success_msg', 'Thank You! Your order has been placed successfully!' . $order);
                redirect(base_url() . 'mitra/orders');
            } else {
                $data['error_msg'] = "Order submission failed, please try again.";
            }
        }

        $data['mitra'] = $mitra;
        $data['cartItems'] = $this->cart->contents();
        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/checkout', $data);
        $this->load->view('mitra/partials/footer');
    }

    public function placeOrder($mitra_id)
    {
        $cartItems = $this->cart->contents();
        $i = 0;
        foreach ($cartItems as $item) {
            $orderData[$i]['mitra_id'] = $mitra_id;
            $orderData[$i]['p_id'] = $item['id'];
            $orderData[$i]['name'] =  $item['name'];
            $orderData[$i]['quantity'] = $item['qty'];
            $orderData[$i]['price'] = $item['subtotal'];
            $orderData[$i]['date'] = date('Y-m-d H:i:s', now());
            $orderData[$i]['success-date'] = date('Y-m-d H:i:s', now());
            $i++;
        }

        if (!empty($orderData)) {
            $insertOrder = $this->Order_model->insertOrder($orderData);
            if ($insertOrder) {
                $this->cart->destroy();
                //return order id
                return $insertOrder;
            }
        }
        return false;
    }
}
