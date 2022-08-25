<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_buyer_laporan');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Laporan Pengajuan',
			'laporan' => $this->model_buyer_laporan->get_all_data(),
			'isi' => 'admin/v_laporan',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	public function delete($id_laporan = NULL)
	{
		$data = array('id_laporan' => $id_laporan);
		$this->model_buyer_laporan->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		redirect('laporan');
	}
}

/* End of file Kategori.php */
