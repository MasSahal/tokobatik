<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pesanan','m_pesanan');

		// if(empty($this->session->userdata('id_admin')))
		// {
		// 	$this->session->set_flashdata('pesan', 'Login terlebih dahulu');
		// 	redirect('auth/login/login');
		// }

	}

	public function index()
	{

		$dataOrder = $this->m_pesanan->getAllOrderAdmin();

		$data = array(
				'title' => 'Pesanan saya',
				'isi' => 'admin/v_pesanan',
				'dataOrder'	=> $dataOrder
			);
			$this->load->view('templateAdmin/halaman_Admin', $data, FALSE);
	}

	public function detail($no_order)
	{

		$dataOrder = $this->m_pesanan->getOrderDetail($no_order);
		 

		$data = array(
				'title' => 'Pesanan saya',
				'isi' => 'admin/v_pesanan_detail',
				'no_order' => $no_order,
				'dataOrder'	=> $dataOrder
			);
			$this->load->view('templateAdmin/halaman_Admin', $data, FALSE);
	}

	public function proses_pesanan($no_order)
	{

		$dataOrder = $this->m_pesanan->getOrderDetail($no_order);
		 

		$data = array(
				'title' => 'Pesanan saya',
				'isi' => 'admin/v_pesanan_detail',
				'no_order' => $no_order,
				'dataOrder'	=> $dataOrder
			);
			$this->load->view('templateAdmin/halaman_Admin', $data, FALSE);
	}

	public function hapus_pesanan($no_order)
	{

		$dataOrder = $this->m_pesanan->hapusPesanan($no_order);
		 
		$this->session->set_flashdata('pesan','Data berhasil dihapus');

		redirect(BASE_URL().'pesanan_admin');
	}

	public function konfirmasi($type,$no_order)
	{

		if($type == "konfirmasi")
		{
			$data = array('status_order' => 'Sudah Dikonfirmasi');
		 
		}else if($type == "dikirim") {

			$no_resi = $this->input->post('no_resi');
			$data = array('status_order' => 'Sudah Dikirim', 'no_resi' => $no_resi);

		}else if($type == "selesai")
		{
			$data = array('status_order' => 'Selesai');
		 
		}

		$dataOrder = $this->m_pesanan->konfirmasiOrder($no_order,$data);
		$this->session->set_flashdata('pesan','status pesanan berhasil diubah');
 		redirect(BASE_URL().'pesanan_admin/detail/'.$no_order);
	}

}