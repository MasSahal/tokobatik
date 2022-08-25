<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_gambar_produk extends CI_Model
{
	public function get_all_data()
	{
		$this->db->select('tabel_produk.*,COUNT(tabel_gambar.id_produk) as total_gambar');
		$this->db->from('tabel_produk');
		$this->db->join('tabel_gambar', 'tabel_gambar.id_produk = tabel_produk.id_produk', 'left');
		$this->db->group_by('tabel_produk.id_produk');
		$this->db->order_by('tabel_produk.id_produk', 'desc');
		return $this->db->get()->result();
	}

	public function get_data($id_gambar_produk)
	{
		$this->db->select('*');
		$this->db->from('tabel_gambar');
		$this->db->where('id_gambar_produk', $id_gambar_produk);
		return $this->db->get()->row();
	}

	public function get_gambar($id_produk)
	{
		$this->db->select('*');
		$this->db->from('tabel_gambar');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tabel_gambar', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_gambar_produk', $data['id_gambar_produk']);
		$this->db->delete('tabel_gambar', $data);
	}
}
