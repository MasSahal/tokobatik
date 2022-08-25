<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_buyer_produk');
	}


	public function index()
	{
		$data = array(
			'title' => 'Produk Buyer',
			'produk' => $this->model_buyer_produk->get_all_data(),
			'isi' => 'v_produk',
		);
		$this->load->view('template/halaman', $data, FALSE);
	}	

	public function detail_produk($id_produk)
	{
		$data = array(
			'title' => 'Detail Produk',
			'gambar' => $this->model_buyer_produk->gambar_produk($id_produk), //gambar selain civer
			'produk' => $this->model_buyer_produk->detail_produk($id_produk), //gamabr cover produk
			'isi' => 'v_detail_produk',
		);
		$this->load->view('template/halaman', $data, FALSE);
	}

	
}
