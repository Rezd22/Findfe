<?php
defined('BASEPATH') or exit('No direct script access allowed');

class toko extends CI_Controller
{

	public function index()
	{
		$this->load->model('Store_model');
		$stores = $this->Store_model->getResInfo();
		$data['stores'] = $stores;
		$this->load->view('front/partials/header');
		$this->load->view('front/toko', $data);
		$this->load->view('front/partials/footer');
	}
	public function popular()
	{
		$this->load->model('Store_model');
		$popular_stores = $this->Store_model->get_popular_stores();
		$data['popular_stores'] = $popular_stores;
		$this->load->view('front/rating', $data);
	}
}
