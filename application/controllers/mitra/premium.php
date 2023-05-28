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
		$this->load->model('premium_model');
		$premiums = $this->premium_model->getResInfo();

		$this->load->model('Store_model');
		$res = $this->Store_model->getStores();

		$data['premiums'] = $premiums;
		$data['res'] = $res;
		$this->load->view('mitra/partials/header');
		$this->load->view('mitra/premium/list', $data);
		$this->load->view('mitra/partials/footer');
	}

	public function addToCart($id)
	{
		$this->load->model('premium_model');
		$premium = $this->premium_model->getSinglepremium($id);
		$data = array(
			'p_id'    => $premium['p_id'],
			'r_id'  => $premium['r_id'],
			'qty'   => 1,
			'price' => $premium['price'],
			'p_name' => $premium['p_name'],
			'image' => $premium['img']
		);
		$this->cart->insert($data);
		redirect(base_url() . 'cart/index');
	}
}
