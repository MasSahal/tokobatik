<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_header');
	}

    public function kategori($id_kategori)
    {
      $kategori = $this->model_header->kategori($id_kategori);
      $data = array(
        'title' => 'Kategori Barang : ' . $kategori->nama_kategori,
        'barang' => $this->model_header->get_all_data_produk($id_kategori),
        'isi' => 'v_kategori_produk',
      );
      $this->load->view('template/halaman', $data, FALSE);
  	}
}