<?php
defined('BASEPATH') or exit('No direct script access allowed');



class lihatstok extends CI_Controller
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
        $data['countstore'] = $this->store_model->countstore();
        $data['countkopi'] = $this->Menu_model->countkopi();
        $data['kopieshall'] = $this->Menu_model->getkopieshall();
        $data['countstock'] = $this->Menu_model->countstock();
        $data['countUser'] = $this->User_model->countUser();
        $data['countOrders'] = $this->Order_model->countOrders();
        $data['countCategory'] = $this->Category_model->countCategory();
        $data['countPendingOrders'] = $this->Order_model->countPendingOrders();
        $data['countDeliveredOrders'] = $this->Order_model->countDeliveredOrders();
        $data['countRejectedOrders'] = $this->Order_model->countRejectedOrders();
        $data['date'] = date('Y-m-d H:i:s', now());

        $resReport = $this->mitra_model->getResReport();
        $data['resReport'] = $resReport;

        $kopiReport = $this->mitra_model->kopiReport();
        $data['kopiReport'] = $kopiReport;
        $this->load->view('front/partials/header');
        $this->load->view('front/lihatstock', $data);
        $this->load->view('front/partials/footer');
    }

    public function resReport()
    {
        $resReport = $this->mitra_model->getResReport();
        $data['resReport'] = $resReport;
        $this->load->view('front/reports/res_report', $data);
    }

    public function kopiesReport()
    {
        $kopiReport = $this->mitra_model->kopiReport();
        $data['kopiReport'] = $kopiReport;
        $this->load->view('front/reports/Store_report', $data);
    }



    public function ordersReport()
    {
        $resReport = $this->mitra_model->getResReport();
        $data['resReport'] = $resReport;

        $this->load->view('front/partials/header');
        $this->load->view('front/reports/res_report', $data);
        $this->load->view('front/partials/footer');
    }
    public function create_menu()
    {

        $this->load->helper('common_helper');
        $this->load->model('Store_model');
        $kopi = $this->store_model->getkopis();

        $config['upload_path']          = './public/uploads/kopiesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'kopi name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required');
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
                    $formArray['stock'] = $this->input->post('stock');
                    $formArray['r_id'] = $this->input->post('rname');

                    $this->Menu_model->create($formArray);

                    $this->session->set_flashdata('Store_success', 'Menu added successfully');
                    redirect(base_url() . 'front/lihatstock/index');
                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>", "</p>");
                    $data['errorImageUpload'] = $error;
                    $data['kopis'] = $kopi;
                    $this->load->view('front/partials/header');
                    $this->load->view('front/editstock', $data);
                    $this->load->view('front/partials/footer');
                }
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('name');
                $formArray['about'] = $this->input->post('about');
                $formArray['stock'] = $this->input->post('stock');
                $formArray['r_id'] = $this->input->post('rname');

                $this->Menu_model->create($formArray);

                $this->session->set_flashdata('Store_success', 'kopi added successfully');
                redirect(base_url() . 'front/lihatstock/index');
            }
        } else {
            $Store_data['kopis'] = $kopi;
            $this->load->view('front/partials/header');
            $this->load->view('front/editstock', $Store_data);
            $this->load->view('front/partials/footer');
        }
    }
}
