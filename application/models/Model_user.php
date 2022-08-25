<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tabel_buyer');
		$this->db->order_by('id_buyer', 'asc');
		return $this->db->get()->result();
	}

	public function delete($data)
	{
		$this->db->where('id_buyer', $data['id_buyer']);
		$this->db->delete('tabel_buyer', $data);
	}
}
