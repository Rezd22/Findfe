<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium extends CI_Controller
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
        $this->load->model('premium_model');
        $premiums = $this->premium_model->getpremiums();
        $premium_data['premiums'] = $premiums;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/premium/list', $premium_data);
        $this->load->view('admin/partials/footer');
    }

    public function create_premium()
    {

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/premium/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);



        $this->load->model('premium_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('res_name', 'premium name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('url', 'URL', 'trim|required');
        $this->form_validation->set_rules('o_hr', 'o_hr', 'trim|required');
        $this->form_validation->set_rules('c_hr', 'c_hr', 'trim|required');
        $this->form_validation->set_rules('o_days', 'o_days', 'trim|required');



        if ($this->form_validation->run() == true) {


            if (!empty($_FILES['image']['name'])) {
                //image is selected
                if ($this->upload->do_upload('image')) {
                    //file uploaded suceessfully


                    $data = $this->upload->data();


                    //resizing image for admin
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('res_name');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['url'] = $this->input->post('url');
                    $formArray['o_hr'] = $this->input->post('o_hr');
                    $formArray['c_hr'] = $this->input->post('c_hr');
                    $formArray['o_days'] = $this->input->post('o_days');


                    $this->premium_model->create($formArray);

                    $this->session->set_flashdata('res_success', 'premium added successfully');
                    redirect(base_url() . 'admin/premium/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;
                    $data['cats'] = $cat;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/premium/add_res', $data);
                    $this->load->view('admin/partials/footer');
                }
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('res_name');
                $formArray['email'] = $this->input->post('email');
                $formArray['url'] = $this->input->post('url');
                $formArray['o_hr'] = $this->input->post('o_hr');
                $formArray['c_hr'] = $this->input->post('c_hr');
                $formArray['o_days'] = $this->input->post('o_days');



                $this->premium_model->create($formArray);

                $this->session->set_flashdata('res_success', 'premium added successfully');
                redirect(base_url() . 'admin/premium/index');
            }
        } else {
            $data['cats'] = $cat;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/premium/add_res', $data);
            $this->load->view('admin/partials/footer');
        }
    }

    public function edit($id)
    {
        $this->load->model('premium_model');
        $premium = $this->premium_model->getpremium($id);

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

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
        $this->form_validation->set_rules('res_name', 'premium name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('url', 'URL', 'trim|required');
        $this->form_validation->set_rules('o_hr', 'o_hr', 'trim|required');
        $this->form_validation->set_rules('c_hr', 'c_hr', 'trim|required');
        $this->form_validation->set_rules('o_days', 'o_days', 'trim|required');



        if ($this->form_validation->run() == true) {

            if (!empty($_FILES['image']['name'])) {
                //image is selected
                if ($this->upload->do_upload('image')) {
                    //file uploaded suceessfully


                    $data = $this->upload->data();


                    //resizing image
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('res_name');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['url'] = $this->input->post('url');
                    $formArray['o_hr'] = $this->input->post('o_hr');
                    $formArray['c_hr'] = $this->input->post('c_hr');
                    $formArray['o_days'] = $this->input->post('o_days');



                    $this->premium_model->update($id, $formArray);

                    //deleting existing files

                    if (file_exists('./public/uploads/premium/' . $premium['img'])) {
                        unlink('./public/uploads/premium/' . $premium['img']);
                    }

                    if (file_exists('./public/uploads/premium/thumb/' . $premium['img'])) {
                        unlink('./public/uploads/premium/thumb/' . $premium['img']);
                    }

                    $this->session->set_flashdata('res_success', 'premium updated successfully');
                    redirect(base_url() . 'admin/premium/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;
                    $data['premium'] = $premium;
                    $data['cats'] = $cat;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/premium/edit', $data);
                    $this->load->view('admin/partials/footer');
                }
            } else {

                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('res_name');
                $formArray['email'] = $this->input->post('email');
                $formArray['url'] = $this->input->post('url');
                $formArray['o_hr'] = $this->input->post('o_hr');
                $formArray['c_hr'] = $this->input->post('c_hr');
                $formArray['o_days'] = $this->input->post('o_days');



                $this->premium_model->update($id, $formArray);

                $this->session->set_flashdata('res_success', 'premium updated successfully');
                redirect(base_url() . 'admin/premium/index');
            }
        } else {
            $data['premium'] = $premium;
            $data['cats'] = $cat;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/premium/edit', $data);
            $this->load->view('admin/partials/footer');
        }
    }

    public function delete($id)
    {

        $this->load->model('premium_model');
        $premium = $this->premium_model->getpremium($id);

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

        $this->session->set_flashdata('res_success', 'premium deleted successfully');
        redirect(base_url() . 'admin/premium/index');
    }
}
