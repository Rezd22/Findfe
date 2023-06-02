<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $mitra = $this->session->userdata('admin');
        if (empty($mitra)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'admin/login/index');
        }
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('premium_model');
        $premiumesh = $this->premium_model->getpremiums();
        $data['premiumesh'] = $premiumesh;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/premium/list', $data);
        $this->load->view('admin/partials/footer');
    }

    public function create_premium()
    {

        $this->load->helper('common_helper');
        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();

        $config['upload_path']          = './public/uploads/premium/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->model('premium_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'premium name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');


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


                    $this->premium_model->create($formArray);

                    $this->session->set_flashdata('premium_success', 'premium added successfully');
                    redirect(base_url() . 'admin/premium/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;
                    $data['stores'] = $store;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/premium/add_premium', $data);
                    $this->load->view('admin/partials/footer');
                }
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('name');
                $formArray['about'] = $this->input->post('about');
                $formArray['price'] = $this->input->post('price');
                $formArray['r_id'] = $this->input->post('rname');

                $this->premium_model->create($formArray);

                $this->session->set_flashdata('premium_success', 'premium added successfully');
                redirect(base_url() . 'admin/premium/index');
            }
        } else {
            $store_data['stores'] = $store;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/premium/add_premium', $store_data);
            $this->load->view('admin/partials/footer');
        }
    }

    public function edit($id)
    {
        $this->load->model('premium_model');
        $premium = $this->premium_model->getSinglepremium($id);

        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();

        if (empty($premium)) {

            $this->session->set_flashdata('error', 'premium not found');
            redirect(base_url() . 'admin/premium/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/premium/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'premium name', 'trim|required');
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
                    $formArray['p_id'] = $this->input->post('rname');

                    $this->premium_model->update($id, $formArray);

                    //deleting existing images

                    if (file_exists('./public/uploads/premium/' . $premium['img'])) {
                        unlink('./public/uploads/premium/' . $premium['img']);
                    }

                    if (file_exists('./public/uploads/premium/thumb/' . $premium['img'])) {
                        unlink('./public/uploads/premium/thumb/' . $premium['img']);
                    }

                    $this->session->set_flashdata('premium_success', 'premium updated successfully');
                    redirect(base_url() . 'admin/premium/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;
                    $data['premium'] = $premium;
                    $data['stores'] = $store;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/premium/edit', $data);
                    $this->load->view('admin/partials/footer');
                }
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('name');
                $formArray['about'] = $this->input->post('about');
                $formArray['price'] = $this->input->post('price');
                $formArray['p_id'] = $this->input->post('rname');

                $this->premium_model->update($id, $formArray);

                $this->session->set_flashdata('premium_success', 'premium updated successfully');
                redirect(base_url() . 'admin/premium/index');
            }
        } else {
            $data['premium'] = $premium;
            $data['stores'] = $store;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/premium/edit', $data);
            $this->load->view('admin/partials/footer');
        }
    }
    public function delete($id)
    {

        $this->load->model('premium_model');
        $premium = $this->premium_model->getSinglepremium($id);

        if (empty($premium)) {
            $this->session->set_flashdata('error', 'premium not found');
            redirect(base_url() . 'admin/premium');
        }

        if (file_exists('./public/uploads/premium/' . $premium['img'])) {
            unlink('./public/uploads/premium/' . $premium['img']);
        }

        if (file_exists('./public/uploads/premium/thumb/' . $premium['img'])) {
            unlink('./public/uploads/premium/thumb/' . $premium['img']);
        }

        $this->premium_model->delete($id);

        $this->session->set_flashdata('premium_success', 'premium deleted successfully');
        redirect(base_url() . 'admin/premium/index');
    }
}
