<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kopi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //Load cart libraray
        $this->load->library('cart');
    }

    public function list($id)
    {
        $this->load->model('Menu_model');
        $kopiesh = $this->Menu_model->getkopiesh($id);

        $this->load->model('Store_model');
        $res = $this->Store_model->getStore($id);

        $data['kopiesh'] = $kopiesh;
        $data['res'] = $res;
        $this->load->view('front/partials/header');
        $this->load->view('front/kopi', $data);
        $this->load->view('front/partials/footer');
    }

    public function addToCart($id)
    {
        $this->load->model('Menu_model');
        $kopiesh = $this->Menu_model->getSinglekopi($id);
        $data = array(
            'id'    => $kopiesh['d_id'],
            'r_id'  => $kopiesh['r_id'],
            'qty'   => 1,
            'price' => $kopiesh['price'],
            'name' => $kopiesh['name'],
            'image' => $kopiesh['img']
        );
        $this->cart->insert($data);
        redirect(base_url() . 'cart/index');
    }
}
