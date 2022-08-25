<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_user');
  }

  
	public function index()
	{
		$data = array(
			'title' => 'Dashboard Admin',
			'dashboard' => $this->model_user->get_all_data(),
			'isi' => 'admin/v_dashboard',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	public function delete($id_buyer = NULL)
	{
		$data = array('id_buyer' => $id_buyer);
		$this->model_user->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		redirect('admin');
	}


}