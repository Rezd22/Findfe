<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $mitra = $this->session->userdata('mitra');
        if (empty($mitra)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url() . 'mitra/login/index');
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


        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/dashboard', $data);
        $this->load->view('mitra/partials/footer');
    }


    public function usersReport()
    {
        echo "user";
    }

    public function ordersReport()
    {
        $resReport = $this->mitra_model->getResReport();
        $data['resReport'] = $resReport;

        $this->load->view('mitra/partials/header');
        $this->load->view('mitra/reports/res_report', $data);
        $this->load->view('mitra/partials/footer');
    }
    // public function generate_pdf($id)
    // {
    //     //load pdf library
    //     $this->load->library('Pdf');

    //     $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //     // set document information
    //     $pdf->SetCreator(PDF_CREATOR);
    //     $pdf->SetAuthor('www.Findfe.com');
    //     $pdf->SetTitle('Report');
    //     $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
    //     $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

    //     // set default header data
    //     $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    //     // set header and footer fonts
    //     $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    //     $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    //     // set default monospaced font
    //     $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //     // set margins
    //     $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    //     $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //     $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //     // set auto page breaks
    //     $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //     // set image scale factor
    //     $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //     // set font
    //     $pdf->SetFont('times', 'BI', 12);

    //     // ---------------------------------------------------------


    //     //Generate HTML table data from MySQL - start
    //     $template = array(
    //         'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
    //     );

    //     $this->table->set_template($template);

    //     if ($id == 1) {
    //         $resReport = $this->mitra_model->getResReport();
    //         $this->table->set_heading('Id', 'toko', 'Total-sales');
    //         foreach ($resReport as $sf) :
    //             $this->table->add_row($sf->r_id, $sf->name, $sf->price);
    //         endforeach;
    //     } else if ($id == 2) {
    //         $this->table->set_heading('Id', 'kopi name', 'total number of times kopi ordered');
    //         $kopiReport = $this->mitra_model->kopiReport();
    //         foreach ($kopiReport as $sf) :
    //             $this->table->add_row($sf->d_id, $sf->d_name, $sf->qty);
    //         endforeach;
    //     } else {
    //         redirect(base_url() . 'mitra/home');
    //     }



    // $html = $this->table->generate();
    // //Generate HTML table data from MySQL - end

    // // add a page
    // $pdf->AddPage();

    // // output the HTML content
    // $pdf->writeHTML($html, true, false, true, false, '');

    // // reset pointer to the last page
    // $pdf->lastPage();

    // //Close and output PDF document
    // $pdf->Output(md5(time()) . '.pdf', 'I');
    // }
}
