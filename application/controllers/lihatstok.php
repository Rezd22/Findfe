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

        $this->load->model('mitra_model');
        $this->load->model('Store_model');
        $this->load->model('Menu_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
        $this->load->model('Category_model');
    }
    public function index()
    {
        $data['countStore'] = $this->Store_model->countStore();
        $data['countkopi'] = $this->Menu_model->countkopi();
        $data['countUser'] = $this->User_model->countUser();
        $data['countOrders'] = $this->Order_model->countOrders();
        $data['countCategory'] = $this->Category_model->countCategory();
        $data['countPendingOrders'] = $this->Order_model->countPendingOrders();
        $data['countDeliveredOrders'] = $this->Order_model->countDeliveredOrders();
        $data['countRejectedOrders'] = $this->Order_model->countRejectedOrders();

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
        $this->load->view('front/reports/kopi_report', $data);
    }



    public function ordersReport()
    {
        $resReport = $this->mitra_model->getResReport();
        $data['resReport'] = $resReport;

        $this->load->view('front/partials/header');
        $this->load->view('front/reports/res_report', $data);
        $this->load->view('front/partials/footer');
    }
}
