<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_buyer_testimoni extends CI_Model
{
	public function testimoni($data)
	{
		$this->db->insert('tabel_testimoni', $data);
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tabel_testimoni');
		$this->db->order_by('id_testimoni', 'asc');
		return $this->db->get()->result();
	}

	public function delete($data)
	{
		$this->db->where('id_testimoni', $data['id_testimoni']);
		$this->db->delete('tabel_testimoni', $data);
	}
}