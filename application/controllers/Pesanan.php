<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pesanan','m_pesanan');

		if(empty($this->session->userdata('id_buyer')))
		{
			$this->session->set_flashdata('pesan', 'Login terlebih dahulu');
			redirect('auth/login/login');

		}

	}

	public function index()
	{

		$dataOrder = $this->m_pesanan->getAllOrder($this->session->userdata('id_buyer'));

		$data = array(
				'title' => 'Pesanan saya',
				'isi' => 'v_pesanan',
				'dataOrder'	=> $dataOrder
			);
			$this->load->view('template/halaman', $data, FALSE);
	}

	public function detail($no_order)
	{

		$dataOrder = $this->m_pesanan->getOrderDetail($no_order);
		 

		$data = array(
				'title' => 'Pesanan saya',
				'isi' => 'v_pesanan_detail',
				'no_order' => $no_order,
				'dataOrder'	=> $dataOrder
			);
			$this->load->view('template/halaman', $data, FALSE);
	}

	public function konfirmasi($type,$no_order)
	{

		if($type == "sampai")
		{
			$data = array('status_order' => 'sampai');
		 
		}

		$dataOrder = $this->m_pesanan->konfirmasiOrder($no_order,$data);
		$this->session->set_flashdata('pesan','status pesanan telah diubah');
 		redirect(BASE_URL().'pesanan/detail/'.$no_order);
	}

	public function hapus_pesanan($no_order)
	{

		$dataOrder = $this->m_pesanan->hapusPesanan($no_order);
		 
		$this->session->set_flashdata('pesan','Pesanan berhasil dibatalkan');
		redirect(BASE_URL().'pesanan');
	}


}