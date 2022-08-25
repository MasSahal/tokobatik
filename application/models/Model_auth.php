<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{
	public function login_buyer($email, $password)
	{
		$this->db->select('*');
		$this->db->from('tabel_buyer');
		$this->db->where(array(
			'email' => $email,
			'password' => $password
		));
		return $this->db->get()->row();
	}
    public function register($data)
	{
		$this->db->insert('tabel_buyer', $data);
	}

	public function get_data($id_buyer)
	{
		$this->db->select('*');
		$this->db->from('tabel_buyer');
		return $this->db->get()->result();
	}

	public function edit_profile($data)
	{
		$this->db->where('id_buyer', $data['id_buyer']);
		$this->db->update('tabel_buyer', $data);
	}
}

/* End of file M_auth.php */
