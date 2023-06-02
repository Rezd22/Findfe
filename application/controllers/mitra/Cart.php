<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('mitra');
        if (empty($user)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'mitra/login');
        }

        //Load cart libraray
        $this->load->library('cart');
        $this->load->model('Premium_model');
    }

    public function index()
    {

        $data['cartItems'] = $this->cart->contents();
        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/cart', $data);
        $this->load->view('mitra/partials/footer');
    }

    function updateCartItemQty()
    {
        $update = 0;

        //Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        echo $update ? 'ok' : 'err';
    }

    function removeItem($id)
    {
        $remove = $this->cart->remove($id);

        redirect(base_url() . 'mitra/cart');
    }
}
