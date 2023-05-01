<?php
defined('BASEPATH') or exit('No direct script access allowed');

class editstock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('user');
        if (empty($user)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'login/');
        }
        $this->load->helper('date');
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
        $data['date'] = date('Y-m-d H:i:s', now());


        $this->load->view('front/partials/header');
        $this->load->view('front/editstock', $data);
        $this->load->view('front/partials/footer');
    }
    public function editstock()
    {

        $formdata = $this->input->post();
        $id = $formdata['rname'];
        $stock = $formdata['stock'];
        $this->Menu_model->editstock($id,  $stock);
        redirect('lihatstok');
    }
}
