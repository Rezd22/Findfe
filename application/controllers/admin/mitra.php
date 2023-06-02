<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if (empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'admin/login/index');
        }
    }

    public function index()
    {
        $this->load->model('mitra_model');
        $mitras = $this->mitra_model->getUsers();
        $data['mitras'] = $mitras;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/mitra/list', $data);
        $this->load->view('admin/partials/footer');
    }
    public function create_user()
    {

        $this->load->model('mitra_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == true) {

            $formArray['username'] = $this->input->post('username');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);


            $this->mitra_model->create($formArray);

            $this->session->set_flashdata('success', 'User added successfully');
            redirect(base_url() . 'admin/mitra/index');
        } else {
            $this->load->view('admin/partials/header');
            $this->load->view('admin/mitra/add_user');
            $this->load->view('admin/partials/footer');
        }
    }

    public function edit($id)
    {
        $this->load->model('mitra_model');
        $mitra = $this->mitra_model->getUser($id);

        if (empty($mitra)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url() . 'admin/mitra/index');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == true) {

            $formArray['username'] = $this->input->post('username');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);



            $this->mitra_model->update($id, $formArray);

            $this->session->set_flashdata('success', 'User updated successfully');
            redirect(base_url() . 'admin/mitra/index');
        } else {
            $data['mitra'] = $mitra;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/mitra/edit', $data);
            $this->load->view('admin/partials/footer');
        }
    }

    public function delete($id)
    {
        $this->load->model('mitra_model');
        $mitra = $this->mitra_model->getUser($id);

        if (empty($mitra)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url() . 'admin/mitra/index');
        }

        $this->mitra_model->delete($id);

        $this->session->set_flashdata('success', 'User deleted successfully');
        redirect(base_url() . 'admin/mitra/index');
    }
}
