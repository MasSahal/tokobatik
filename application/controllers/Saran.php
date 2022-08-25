<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_buyer_saran');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Laporan Saran',
			'saran' => $this->model_buyer_saran->get_all_data(),
			'isi' => 'admin/v_saran',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	public function delete($id_saran = NULL)
	{
		$data = array('id_saran' => $id_saran);
		$this->model_buyer_saran->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		redirect('saran');
	}
}

/* End of file Kategori.php */
