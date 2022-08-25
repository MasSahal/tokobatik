<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kategori');

		$this->data = [
			'kategori' => $this->model_kategori->get_all_data(),
		];
	}


	public function index()
	{
		$this->template->load('user/template/index', 'user/home', $this->data);
	}

	public function halaman1()
	{
		// $this->load->view('template/header.php', $this->data);
		$this->load->view('v_halaman1.php');
		$this->load->view('template/footer.php');
	}

	public function halaman2()
	{
		// $this->load->view('template/header.php');
		$this->load->view('v_halaman2.php');
		$this->load->view('template/footer.php');
	}

	// public function laporan() 
	// { 
	//   $data = array(
	//     'title' => 'laporan',
	//     'laporan' => $this->model_laporan->get_all_data(),
	//     'isi' => 'v_laporan',
	//   );
	//   $this->load->view('template/halaman', $data, FALSE);
	// }
}
