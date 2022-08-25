<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_buyer_testimoni');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Laporan Testimoni',
			'testimoni' => $this->model_buyer_testimoni->get_all_data(),
			'isi' => 'admin/v_testimoni',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	public function delete($id_testimoni = NULL)
	{
		$data = array('id_testimoni' => $id_testimoni);
		$this->model_buyer_testimoni->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		redirect('testimoni');
	}
}

/* End of file Kategori.php */
