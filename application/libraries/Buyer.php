<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buyer
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('model_auth');
	}

	public function login($email, $password)
	{
		$cek = $this->ci->model_auth->login_buyer($email, $password);
		if ($cek) {
			$id_buyer = $cek->id_buyer;
			$nama= $cek->nama;
			$email = $cek->email;
			$foto = $cek->foto;
			$username = $cek->username;
			$alamat = $cek->alamat;
			$no_hp = $cek->no_hp;
			$salt = $cek->salt;
			//buat session
			$this->ci->session->set_userdata('id_buyer', $id_buyer);
			$this->ci->session->set_userdata('nama', $nama);
			$this->ci->session->set_userdata('email', $email);
			$this->ci->session->set_userdata('foto', $foto);
			$this->ci->session->set_userdata('username', $username);
			$this->ci->session->set_userdata('alamat', $alamat);
			$this->ci->session->set_userdata('no_hp', $no_hp);
			$this->ci->session->set_userdata('salt', $salt);
			
			if ($salt == "admin") {
				return redirect('admin');
			} else {
				return redirect('home');
			}
		} else {
			//jika salah
			$this->ci->session->set_flashdata('error', 'Email Atau Password Anda Salah');
			redirect('auth/login/login');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('nama') == '') {
			$this->ci->session->set_flashdata('error', 'Anda Belum Login !!!!');
			redirect('auth/login/login');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_buyer');
		$this->ci->session->unset_userdata('nama');
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('foto');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('alamat');
		$this->ci->session->unset_userdata('no_hp');
		$this->ci->session->unset_userdata('salt');
		$this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
		redirect('auth/login/login');
	}
}

/* End of file User_login.php */
