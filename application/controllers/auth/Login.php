<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_auth');
		$this->load->library('form_validation');
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('email', 'E-mail', 'required|is_unique[tabel_buyer.email]', array(
			'required' => '%s Harus Diisi!',
			'is_unique' => '%s Ini Sudah Terdaftar!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password!', 'required|matches[password]', array(
			'required' => '%s Harus Diisi!',
			'matches' => '%s Password Tidak Sama!'
		));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Register Pelanggan',
				'isi' => 'view_register',
			);
			$this->load->view('template/halaman', $data, FALSE);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$this->model_auth->register($data);
			$this->session->set_flashdata('pesan', 'Selamat, Register Berhasil Silahkan Login Kembali!');
			redirect('auth/login/register');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'E-Mail', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi!'
		));


		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->buyer->login($email, $password); //dari libraries
		}
		$data = array(
			'title' => 'Buyer Login',
			'isi' => 'v_login',
		);
		$this->load->view('template/halaman.php', $data, FALSE);
	}


	public function logout()
	{
		$this->cart->destroy();
		$this->buyer->logout();
	}

	public function akun()
	{
		//proteksi halaman
		$this->buyer->proteksi_halaman();
		$data = array(
			'title' => 'Akun Saya',
			'isi' => 'v_akun',
		);
		$this->load->view('template/halaman', $data, FALSE);
	}

	public function edit_proses()
	{
		$id_buyer 	= $_POST['id_buyer']; 
		$nama		= $_POST['nama'];
		$username	= $_POST['username'];
		$email		= $_POST['email'];
		$no_hp		= $_POST['no_hp'];
		$alamat		= $_POST['alamat'];
		$foto		= $this->session->userdata('foto');
		$photo		= $_FILES['photo']['name'];

		$this->form_validation->set_rules('nama', 'Nama User', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('email', 'Email', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
			'required' => '%s Harus Diisi!'
		));
		$this->form_validation->set_rules('no_hp', 'No_Hp', 'required', array(
			'required' => '%s Harus Diisi!'
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('photo')) {
				echo "gagal";
			}else{
				$upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];
			}
			// //jika tanpa ganti gambar
			$data = array(
				'id_buyer'=> $id_buyer,
				'username' => $username,
				'nama' => $nama,
				'email' => $email,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
				'foto' => $foto
			);
			$this->model_auth->edit_profile($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diganti!');
			$this->session->set_userdata($data);
			redirect('auth/login/akun');
		}else{
			echo "Validation error";
		}

		// $data = array(
		// 	'title' => 'Profile',
		// 	'profile'  => $this->model_auth->get_data($id_buyer),
		// 	'isi' => 'v_edit_akun',
		// );
	}
}