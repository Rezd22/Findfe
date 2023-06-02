<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

	public function index()
	{
		$atas = array(
			'menu' => 'beranda'
		);
		$this->load->view('templates/admin/header', $atas);

		$data = array(
			'judul' => 'Pemetaan Lokasi Mitra',
			'geo' => $this->m_model->data_geo(),

		);
		$this->load->view('beranda', $data, FALSE);
		$this->load->view('templates/admin/footer');
	}

	public function biodata()
	{
		$atas = array(
			'menu' => 'biodata'
		);
		$this->load->view('templates/admin/header', $atas);
		$data = array(
			'judul' => 'Biodata Penulis',


		);
		$this->load->view('biodata', $data);
		$this->load->view('templates/admin/footer');
	}

	public function geo()
	{
		$atas = array(
			'menu' => 'geo'
		);
		$this->load->view('templates/admin/header', $atas);
		$data = array(
			'judul' => 'Data Lokasi Mitra'

		);
		$this->load->view('geo', $data);
		$this->load->view('templates/admin/footer');
	}
	public function tampil($offset = null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);

		$this->load->library('pagination');

		$limit = 5;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['base_url'] = base_url('administrator/tampil');
		$config['total_rows'] = $this->m_model->get_tampil_geo($limit, $offset, $search, $count = true, 'geo', 'kecamatan', 'id');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<span uk-pagination-next></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<span uk-pagination-previous></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data['geo'] = $this->m_model->get_tampil_geo($limit, $offset, $search, $count = false, 'geo', 'kecamatan', 'id');
		$data['pagelinks'] = $this->pagination->create_links();
		$this->load->view('ajax/geo_ajax', $data);
	}


	public function saveData()
	{
		$kecamatan = $this->input->post('kecamatan', TRUE);
		$lokasi = $this->input->post('lokasi', TRUE);
		$keterangan = $this->input->post('keterangan');
		$lat = $this->input->post('latitude', TRUE);
		$long = $this->input->post('longitude', TRUE);
		$kategori = $this->input->post('kategori', TRUE);

		$latitude = trim($lat);
		$longitude = trim($long);


		$data = array(
			'kecamatan' => $kecamatan,
			'lokasi' => $lokasi,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'keterangan' => $keterangan,
			'kategori' => $kategori,

		);
		$this->m_model->simpan('geo', $data);
	}

	public function editData()
	{
		$id = $this->input->post('id', TRUE);
		$kecamatan = $this->input->post('kecamatan', TRUE);
		$lokasi = $this->input->post('lokasi', TRUE);
		$keterangan = $this->input->post('keterangan');
		$lat = $this->input->post('latitude', TRUE);
		$long = $this->input->post('longitude', TRUE);
		$kategori = $this->input->post('kategori', TRUE);

		$latitude = trim($lat);
		$longitude = trim($long);


		$data = array(
			'kecamatan' => $kecamatan,
			'lokasi' => $lokasi,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'keterangan' => $keterangan,
			'kategori' => $kategori,

		);
		$this->m_model->editdata('geo', 'id', $id, $data);
	}


	public function hapus()
	{
		$id = $this->input->post('id');

		$this->m_model->hapus('geo', $id, 'id');
	}
	//geo

	// User
	public function users()
	{
		$atas = array(
			'menu' => 'users_map'
		);
		$this->load->view('templates/admin/header', $atas);
		$data = array(
			'judul' => 'Data',


		);
		$this->load->view('users_map', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tampilUsers($offset = null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);

		$this->load->library('pagination');

		$limit = 5;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['base_url'] = base_url('administrator/tampilusers_map');
		$config['total_rows'] = $this->m_model->get_tampil($limit, $offset, $search, $count = true, 'users_map', 'namaLengkap', 'idusers_map');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_userss'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_users_map'] = '<span uk-pagination-next></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_users_map'] = '<span uk-pagination-previous></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_users_map'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_users_map'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data['users_map'] = $this->m_model->get_tampil($limit, $offset, $search, $count = false, 'users_map', 'namaLengkap', 'idusers_map');
		$data['pagelinks'] = $this->pagination->create_links();
		$this->load->view('ajax/users_ajax', $data);
	}

	public function saveDataUsers()
	{
		$pass = $this->input->post('password', TRUE);
		$data = array(
			'namaLengkap' => $this->input->post('nama', TRUE),
			'username' => $this->input->post('username', TRUE),
			'password' => password_hash($pass, PASSWORD_DEFAULT),
			'status' => $this->input->post('status', TRUE),
			'md4' => md5($pass),
		);
		$this->m_model->simpan('users_map', $data);
	}
	public function editDataUsersPass()
	{
		$id = $this->input->post('id', TRUE);
		$pass = $this->input->post('password', TRUE);

		$data = array(
			'namaLengkap' => $this->input->post('nama', TRUE),
			'username' => $this->input->post('username', TRUE),
			'password' => password_hash($pass, PASSWORD_DEFAULT),
			'status' => $this->input->post('status', TRUE),
			'md4' => md5($pass),
		);


		$this->m_model->editdata('users_map', 'idusers_map', $id, $data);
	}
	public function editDataUsers()
	{
		$id = $this->input->post('id', TRUE);

		$data = array(
			'namaLengkap' => $this->input->post('nama', TRUE),
			'username' => $this->input->post('username', TRUE),
			'status' => $this->input->post('status', TRUE),
		);


		$this->m_model->editdata('users_map', 'idusers_map', $id, $data);
	}
	public function hapusUsers()
	{
		$id = $this->input->post('id');
		$this->m_model->hapus('users_map', $id, 'idusers_map');
	}
	//
	// User
}
