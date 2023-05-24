<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mitra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $mitra = $this->session->userdata('mitra');
        if (empty($mitra)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'mitra/login/index');
        }
    }

    public function index()
    {
        $this->load->model('mitra_model');
        $mitra = $this->mitra_model->getUsers();
        $data['users'] = $mitra;
        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/user/list', $data);
        $this->load->view('mitra/partials/footer');
    }
    public function create_user()
    {

        $this->load->model('mitra_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == true) {

            $formArray['username'] = $this->input->post('username');
            $formArray['f_name'] = $this->input->post('firstname');
            $formArray['l_name'] = $this->input->post('lastname');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $formArray['phone'] = $this->input->post('phone');
            $formArray['address'] = $this->input->post('address');


            $this->mitra_model->create($formArray);

            $this->session->set_flashdata('success', 'User added successfully');
            redirect(base_url() . 'mitra/user/index');
        } else {
            $this->load->view('mitra/partials/header');
            $this->load->view('mitra/user/add_user');
            $this->load->view('mitra/partials/footer');
        }
    }

    public function edit($id)
    {
        $this->load->model('mitra_model');
        $mitra = $this->mitra_model->getUser($id);

        if (empty($mitra)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url() . 'mitra/user/index');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == true) {

            $formArray['username'] = $this->input->post('username');
            $formArray['f_name'] = $this->input->post('firstname');
            $formArray['l_name'] = $this->input->post('lastname');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $formArray['phone'] = $this->input->post('phone');
            $formArray['address'] = $this->input->post('address');


            $this->mitra_model->update($id, $formArray);

            $this->session->set_flashdata('success', 'User updated successfully');
            redirect(base_url() . 'mitra/user/index');
        } else {
            $data['mitra'] = $mitra;
            $this->load->view('mitra/partials/header');
            $this->load->view('mitra/user/edit', $data);
            $this->load->view('mitra/partials/footer');
        }
    }

    public function delete($id)
    {
        $this->load->model('mitra_model');
        $mitra = $this->mitra_model->getUser($id);

        if (empty($mitra)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url() . 'mitra/user/index');
        }

        $this->mitra_model->delete($id);

        $this->session->set_flashdata('success', 'User deleted successfully');
        redirect(base_url() . 'mitra/user/index');
    }
}
