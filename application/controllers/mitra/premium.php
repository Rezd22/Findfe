<?php
defined('BASEPATH') or exit('No direct script access allowed');

class premium extends CI_Controller
{

	public function index()
	{
		$this->load->model('premium_model');
		$premiums = $this->premium_model->getResInfo();
		$data['premiums'] = $premiums;
		$this->load->view('mitra/partials/header');
		$this->load->view('mitra/premium/list', $data);
		$this->load->view('mitra/partials/footer');
	}
}
