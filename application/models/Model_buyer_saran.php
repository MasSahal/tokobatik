<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_buyer_saran extends CI_Model
{
	public function saran($data)
	{
		$this->db->insert('tabel_saran', $data);
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tabel_saran');
		$this->db->order_by('id_saran', 'asc');
		return $this->db->get()->result();
	}

	public function delete($data)
	{
		$this->db->where('id_saran', $data['id_saran']);
		$this->db->delete('tabel_saran', $data);
	}
}
