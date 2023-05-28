<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rating extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('rating_model');
   }

   function index()
   {

      $this->load->view('front/partials/header');
      $this->load->view('front/rating');
      $this->load->view('front/partials/footer');
   }

   function fetch()
   {
      echo $this->rating_model->html_output();
   }

   function insert()
   {
      if ($this->input->post('r_id')) {
         $data = array(
            'r_id'  => $this->input->post('r_id'),
            'rating'   => $this->input->post('index')
         );
         $this->rating_model->insert_rating($data);
      }
   }
}
