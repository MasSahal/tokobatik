<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_produk');
		$this->load->model('model_kategori');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'produk',
			'produk' => $this->model_produk->get_all_data(),
			'isi' => 'admin/v_produk',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_produk', 'Produk', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('harga_produk', 'Harga', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('stok_produk', 'stok', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('berat', 'berat', 'required', array(
			'required' => '%s Harus Diisi!'
		));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$field_name = "produk";
			if (!$this->upload->do_upload("gambar")) {
				$data = array(
					'title' => 'Add produk',
					'kategori' => $this->model_kategori->get_all_data(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'admin/v_produk_add',
				);
				$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
			} else {
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/produk/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_produk' => $this->input->post('nama_produk'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga_produk' => $this->input->post('harga_produk'),
					'stok_produk' => $this->input->post('stok_produk'),
					'diskon' => $this->input->post('diskon'),
					'berat' => $this->input->post('berat'),
          			'deskripsi' => nl2br($this->input->post('deskripsi')),
					'gambar_produk'	=> $upload_data['uploads']['file_name'],
				);
				$this->model_produk->add_produk($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
				redirect('produk');
			}
		}

		$data = array(
			'title' => 'Add Produk',
			'kategori' => $this->model_kategori->get_all_data(),
			'isi' => 'admin/v_produk_add',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	//Update one item
	public function edit($id_produk = NULL)
	{
    $this->form_validation->set_rules('nama_produk', 'Produk', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('harga_produk', 'Harga', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('stok_produk', 'stok', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('berat', 'Berat', 'required', array(
			'required' => '%s Harus Diisi!'
		));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$field_name = "produk";
			if (!$this->upload->do_upload("gambar")) {
				$data = array(
					'title' => 'Edit Produk',
					'kategori' => $this->model_kategori->get_all_data(),
					'produk'  => $this->model_produk->get_data($id_produk),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'admin/v_produk_edit',
				);
				$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
			} else {
				//hapus gambar
				$produk = $this->model_produk->get_data($id_produk);
				if ($produk->gambar != "") {
					unlink('./assets/img/produk/' . $produk->gambar);
				}
				//end hapus gambar
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/produk/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_produk'=> $id_produk,
          			'nama_produk' => $this->input->post('nama_produk'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga_produk' => $this->input->post('harga_produk'),
					'stok_produk' => $this->input->post('stok_produk'),
					'diskon' => $this->input->post('diskon'),
					'berat' => $this->input->post('berat'),
       			    'deskripsi' => nl2br($this->input->post('deskripsi')),
					'gambar_produk'	=> $upload_data['uploads']['file_name'],
				);
				$this->model_produk->edit_produk($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diganti!');
				redirect('produk');
			}
			//jika tanpa ganti gambar
			$data = array(
			'id_produk'=> $id_produk,
			'nama_produk' => $this->input->post('nama_produk'),
			'id_kategori' => $this->input->post('id_kategori'),
			'harga_produk' => $this->input->post('harga_produk'),
			'stok_produk' => $this->input->post('stok_produk'),
			'diskon' => $this->input->post('diskon'),
			'berat' => $this->input->post('berat'),
			'deskripsi' => nl2br($this->input->post('deskripsi')),
			);
			$this->model_produk->edit_produk($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diganti!');
			redirect('produk');
		}

		$data = array(
			'title' => 'Edit produk',
			'kategori' => $this->model_kategori->get_all_data(),
			'produk'  => $this->model_produk->get_data($id_produk),
			'isi' => 'admin/v_produk_edit',
		);
		$this->load->view('templateAdmin/halaman_admin', $data, FALSE);
	}

	//Delete one item
	public function delete($id_produk = NULL)
	{
		//hapus gambar
		$produk = $this->model_produk->get_data($id_produk);
		if ($produk->gambar != "") {
			unlink('./assets/img/produk/' . $produk->gambar);
		}
		//end hapus gambar
		$data = array('id_produk' => $id_produk);
		$this->model_produk->delete_produk($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		redirect('produk');
	}
}

/* End of file produk.php */
