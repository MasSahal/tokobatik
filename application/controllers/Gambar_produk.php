<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_gambar_produk');
		$this->load->model('model_produk');
	}


	public function index()
	{
		$data = array(
			'title' => 'Gamar detail produk',
			'gambar_produk' => $this->model_gambar_produk->get_all_data(),
			'isi' => 'admin/gambar/gambar_produk',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	public function add($id_produk)
	{
		$this->form_validation->set_rules('keterangan', 'Ket Gambar', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/produk/gambar_produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$field_name = "gambar_produk";
			if (!$this->upload->do_upload("gambar_produk")) {
				$data = array(
					'title' => 'Add Gambar Produk',
					'error_upload' => $this->upload->display_errors(),
					'produk'  => $this->model_produk->get_data($id_produk),
					'gambar_produk' => $this->model_gambar_produk->get_gambar($id_produk),
					'isi' => 'admin/gambar/add_gambar',
				);
				$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
			} else {
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/produk/gambar_produk/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_produk' => $id_produk,
					'keterangan' => $this->input->post('keterangan'),
					'gambar_produk'	=> $upload_data['uploads']['file_name'],
				);
				$this->model_gambar_produk->add($data);
				$this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan !!!');
				redirect('admin/gambar/add_gambar' . $id_produk);
			}
		}

		$data = array(
			'title' => 'Add Gambar Produk',
			'produk'  => $this->model_produk->get_data($id_produk),
			'gambar_produk' => $this->model_gambar_produk->get_gambar($id_produk),
			'isi' => 'admin/gambar/add_gambar',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	//Delete one item
	public function delete($id_produk, $id_gambar_produk)
	{
		//hapus gambar
		$gambar_produk = $this->model_gambar_produk->get_data($id_gambar_produk);
		if ($gambar_produk->gambar_produk != "") {
			unlink('./assets/img/produk/gambar_produk/' . $gambar_produk->gambar_produk);
		}
		//end hapus gambar
		$data = array('id_gambar_produk' => $id_gambar_produk);
		$this->model_gambar_produk->delete($data);
		$this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus !!!');
		redirect('gambar_produk/add/' . $id_produk);
	}
}
