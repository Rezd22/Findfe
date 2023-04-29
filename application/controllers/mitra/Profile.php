<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $mitra = $this->session->userdata('mitra');
        if (empty($mitra)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'login/mitra');
        }

        $this->load->model('mitra_model');
    }

    public function index()
    {
        $loggedmitra = $this->session->userdata('mitra');
        $id = $loggedmitra['mitra_id'];
        $mitra = $this->mitra_model->getUser($id);
        $data['user'] = $mitra;
        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/profile', $data);
        $this->load->view('mitra/partials/footer');
    }

    public function edit($id)
    {
        $config['upload_path']          = './public/uploads/Sertifikat/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        $mitra = $this->mitra_model->getUser($id);

        if (empty($mitra)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url() . 'mitra/profile');
        }


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == true) {
            if (!empty($_FILES['image']['name'])) { //===========Image

                //image is selected
                if ($this->upload->do_upload('image')) {
                    //file uploaded suceessfully
                    $data = $this->upload->data();
                    //resizing image
                    // resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . $data['file_name'], 300, 270);

                    // resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . $data['file_name'], 1120, 270);

                    // nyimpan datanya jangan langsung nama kasih nama path sekalian biar enak ambil gambarnya
                    // p.jpg
                    // //  /uploads/sertifikat/ . p.jpg
                    // base_url() . $mitra["img"]
                    $formArray['Sertifikat'] = $data['file_name'];
                    $formArray['username'] = $this->input->post('username');
                    $formArray['email'] = $this->input->post('email');

                    $this->mitra_model->update($id, $formArray);

                    $this->session->set_flashdata('success', 'User updated successfully');
                    redirect(base_url() . 'mitra/profile/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;

                    $this->load->view('mitra/partials/header');
                    $this->load->view('mitra/menu/add_menu', $data);
                    $this->load->view('mitra/partials/footer');
                }
            } else {
                //if no image is selcted we will add res data without image

                $formArray['username'] = $this->input->post('username');
                $formArray['email'] = $this->input->post('email');


                $this->mitra_model->update($id, $formArray);

                $this->session->set_flashdata('success', 'User updated successfully Without images');
                redirect(base_url() . 'mitra/profile/index');
            }
        } else {
            $data['user'] = $mitra;
            $this->load->view('mitra/partials/header');
            $this->load->view('mitra/profile', $data);
            $this->load->view('mitra/partials/footer');
        }
    }

    public function editPassword($id)
    {
        $mitra = $this->mitra_model->getUser($id);

        if (empty($mitra)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url() . 'mitra/profile');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('cPassword', 'Current password', 'trim|required');
        $this->form_validation->set_rules('nPassword', 'New password', 'trim|required');
        $this->form_validation->set_rules('nRPassword', 'New password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $cPassword = $this->input->post('cPassword');
            $nPassword = $this->input->post('nPassword');
            $nRPassword = $this->input->post('nRPassword');
            if (password_verify($cPassword, $mitra['password']) == true) {
                if ($nPassword != $nRPassword) {
                    $this->session->set_flashdata('pwd_error', 'password not match');
                    redirect(base_url() . 'mitra/profile/index');
                } else {
                    $formArray['password'] = password_hash($this->input->post('nPassword'), PASSWORD_DEFAULT);

                    $this->mitra_model->update($id, $formArray);
                    $this->session->set_flashdata('pwd_success', 'Password updated successfully');
                    redirect(base_url() . 'mitra/profile/index');
                }
            } else {
                $this->session->set_flashdata('pwd_error', 'Your old password is incorrect');
                redirect(base_url() . 'mitra/profile/index');
            }
        } else {
            $data['user'] = $mitra;
            $this->load->view('mitra/partials/header');
            $this->load->view('mitra/profile', $data);
            $this->load->view('mitra/partials/footer');
        }
    }
}
