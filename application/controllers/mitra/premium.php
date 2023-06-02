<?php
defined('BASEPATH') or exit('No direct scrpremiumespremiumpt access allowed');

class premium extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//Load cart libraray
		$this->load->library('cart');
	}

	public function list()
	{
		$this->load->model('Premium_model');
		$premiumesh = $this->Premium_model->getResInfo();

		$this->load->model('Store_model');
		$res = $this->Store_model->getStores();

		$data['premiumesh'] = $premiumesh;
		$data['res'] = $res;
		$this->load->view('mitra/partials/header');
		$this->load->view('mitra/premium/list', $data);
		$this->load->view('mitra/partials/footer');
	}

	public function addToCart($id)
	{
		$this->load->model('Premium_model');
		$premium = $this->Premium_model->getSinglepremium($id);
		$data = array(
			'id'   => $premium['p_id'],
			'qty'   => 1,
			'price' => $premium['price'],
			'name' => $premium['name'],
			'image' => $premium['img']
		);
		$this->cart->insert($data);
		redirect(base_url() . 'mitra/cart');
	}
}
