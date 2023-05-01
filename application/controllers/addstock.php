<?php
defined('BASEPATH') or exit('No direct script access allowed');

class addstock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('user');
        if (empty($user)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'login/');
        }

        $this->load->model('mitra_model');
        $this->load->model('store_model');
        $this->load->model('Menu_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
        $this->load->model('Category_model');
    }

    public function index()
    {
        $data['kopis'] = $this->Menu_model->getkopieshall();

        $this->load->view('front/partials/header');
        $this->load->view('front/addstock');
        $this->load->view('front/partials/footer');
    }
    public function addstock()
    {

        $this->load->helper('common_helper');
        $this->load->model('Store_model');
        $kopi = $this->store_model->getkopis();



        $formArray['name'] = $this->input->post('name');
        $formArray['price'] = $this->input->post('price');


        $this->Menu_model->addstock($formArray);

        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'kopi name', 'trim|required');


        $this->session->set_flashdata('kopi_success', 'kopi added successfully');
        redirect(base_url() . 'lihatstock');
    }
}
