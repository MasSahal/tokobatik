<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_buyer_laporan extends CI_Model
{
	public function laporan($data)
	{
		$this->db->insert('tabel_laporan', $data);
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tabel_laporan');
		$this->db->order_by('id_laporan', 'asc');
		return $this->db->get()->result();
	}

	public function delete($data)
	{
		$this->db->where('id_laporan', $data['id_laporan']);
		$this->db->delete('tabel_laporan', $data);
	}
}
