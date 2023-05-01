<?php
defined('BASEPATH') or exit('No direct script access allowed');

class deletestock extends CI_Controller
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
        $this->load->view('front/deletestock', $data);
        $this->load->view('front/partials/footer');
    }
    public function delete($id)
    {

        $this->load->model('Menu_model');
        $kopi = $this->Menu_model->getSinglekopi($id);

        if (empty($kopi)) {
            $this->session->set_flashdata('error', 'kopi not found');
            redirect(base_url() . 'lihatstock');
        }

        $this->Menu_model->delete($id);

        $this->session->set_flashdata('kopi_success', 'kopi deleted successfully');
        redirect(base_url() . 'lihatstock');
    }
}
