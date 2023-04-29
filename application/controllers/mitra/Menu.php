<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $mitra = $this->session->userdata('mitra');
        if (empty($mitra)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'mitra/login/index');
        }
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('Menu_model');
        $kopiesh = $this->Menu_model->getMenu();
        $data['kopiesh'] = $kopiesh;
        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/menu/list', $data);
        $this->load->view('mitra/partials/footer');
    }

    public function create_menu()
    {

        $this->load->helper('common_helper');
        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();

        $config['upload_path']          = './public/uploads/kopiesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'kopi name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('rname', 'toko name', 'trim|required');


        if ($this->form_validation->run() == true) {

            if (!empty($_FILES['image']['name'])) {
                //image is selected
                if ($this->upload->do_upload('image')) {
                    //file uploaded suceessfully
                    $data = $this->upload->data();
                    //resizing image
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);

                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'front_thumb/' . $data['file_name'], 1120, 270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['about'] = $this->input->post('about');
                    $formArray['price'] = $this->input->post('price');
                    $formArray['r_id'] = $this->input->post('rname');

                    $this->Menu_model->create($formArray);

                    $this->session->set_flashdata('kopi_success', 'Menu added successfully');
                    redirect(base_url() . 'mitra/menu/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;
                    $data['stores'] = $store;
                    $this->load->view('mitra/partials/header');
                    $this->load->view('mitra/menu/add_menu', $data);
                    $this->load->view('mitra/partials/footer');
                }
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('name');
                $formArray['about'] = $this->input->post('about');
                $formArray['price'] = $this->input->post('price');
                $formArray['r_id'] = $this->input->post('rname');

                $this->Menu_model->create($formArray);

                $this->session->set_flashdata('kopi_success', 'kopi added successfully');
                redirect(base_url() . 'mitra/menu/index');
            }
        } else {
            $store_data['stores'] = $store;
            $this->load->view('mitra/partials/header');
            $this->load->view('mitra/menu/add_menu', $store_data);
            $this->load->view('mitra/partials/footer');
        }
    }

    public function edit($id)
    {
        $this->load->model('Menu_model');
        $kopi = $this->Menu_model->getSinglekopi($id);

        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();

        if (empty($kopi)) {

            $this->session->set_flashdata('error', 'kopi not found');
            redirect(base_url() . 'mitra/menu/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/kopiesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'kopi name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('rname', 'toko name', 'trim|required');

        if ($this->form_validation->run() == true) {

            if (!empty($_FILES['image']['name'])) {
                //image is selected
                if ($this->upload->do_upload('image')) {
                    //file uploaded suceessfully
                    $data = $this->upload->data();
                    //resizing image
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);

                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['about'] = $this->input->post('about');
                    $formArray['price'] = $this->input->post('price');
                    $formArray['r_id'] = $this->input->post('rname');

                    $this->Menu_model->update($id, $formArray);

                    //deleting existing images

                    if (file_exists('./public/uploads/kopiesh/' . $kopi['img'])) {
                        unlink('./public/uploads/kopiesh/' . $kopi['img']);
                    }

                    if (file_exists('./public/uploads/kopiesh/thumb/' . $kopi['img'])) {
                        unlink('./public/uploads/kopiesh/thumb/' . $kopi['img']);
                    }

                    $this->session->set_flashdata('kopi_success', 'kopi updated successfully');
                    redirect(base_url() . 'mitra/menu/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;
                    $data['kopi'] = $kopi;
                    $data['stores'] = $store;
                    $this->load->view('mitra/partials/header');
                    $this->load->view('mitra/menu/edit', $data);
                    $this->load->view('mitra/partials/footer');
                }
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('name');
                $formArray['about'] = $this->input->post('about');
                $formArray['price'] = $this->input->post('price');
                $formArray['r_id'] = $this->input->post('rname');

                $this->Menu_model->update($id, $formArray);

                $this->session->set_flashdata('kopi_success', 'kopi updated successfully');
                redirect(base_url() . 'mitra/menu/index');
            }
        } else {
            $data['kopi'] = $kopi;
            $data['stores'] = $store;
            $this->load->view('mitra/partials/header');
            $this->load->view('mitra/menu/edit', $data);
            $this->load->view('mitra/partials/footer');
        }
    }
    public function delete($id)
    {

        $this->load->model('Menu_model');
        $kopi = $this->Menu_model->getSinglekopi($id);

        if (empty($kopi)) {
            $this->session->set_flashdata('error', 'kopi not found');
            redirect(base_url() . 'mitra/menu');
        }

        if (file_exists('./public/uploads/kopiesh/' . $kopi['img'])) {
            unlink('./public/uploads/kopiesh/' . $kopi['img']);
        }

        if (file_exists('./public/uploads/kopiesh/thumb/' . $kopi['img'])) {
            unlink('./public/uploads/kopiesh/thumb/' . $kopi['img']);
        }

        $this->Menu_model->delete($id);

        $this->session->set_flashdata('kopi_success', 'kopi deleted successfully');
        redirect(base_url() . 'mitra/menu/index');
    }
}
