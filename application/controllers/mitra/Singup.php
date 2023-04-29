<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Singup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mitra_model');
    }


    public function index()
    {
        $this->load->view('mitra/singup');
    }

    public function create_user()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');


        if ($this->form_validation->run() == true) {

            $formArray['username'] = $this->input->post('username');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $formArray['email'] = $this->input->post('email');
            $this->mitra_model->create($formArray);
            $this->session->set_flashdata("success", "Account created successfully, please login");
            redirect(base_url() . 'mitra/login/index');
        } else {
            $this->load->view('mitra\singup');
        }
    }
}
