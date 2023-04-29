<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('mitra/login');
    }

    public function authenticate()
    {
        $this->load->library('form_validation');
        $this->load->model('mitra_model');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $mitra = $this->mitra_model->getByUsername($username);
            if (!empty($mitra)) {
                $password = $this->input->post('password');
                if (password_verify($password, $mitra['password']) == true) {

                    $mitraArray['mitra_id'] = $mitra['mitra_id'];
                    $mitraArray['username'] = $mitra['username'];
                    $this->session->set_userdata('mitra', $mitraArray);
                    redirect(base_url() . 'mitra/home');
                } else {
                    $this->session->set_flashdata('msg', 'Either username or password is incorrect');
                    redirect(base_url() . 'mitra/login/index');
                }
            } else {
                $this->session->set_flashdata('msg', 'Either username or password is incorrect');
                redirect(base_url() . 'mitra/login/index');
            }
            //success
        } else {
            //Error
            $this->load->view('mitra/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('mitra');
        redirect(base_url() . 'mitra/login/index');
    }
}
