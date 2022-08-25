<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_produk extends CI_Model
{
	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tabel_produk');
		$this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_produk.id_kategori', 'left');
		$this->db->order_by('tabel_produk.id_produk', 'desc');
		return $this->db->get()->result();
	}

	public function get_data($id_produk)
	{
		$this->db->select('*');
		$this->db->from('tabel_produk');
		$this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_produk.id_kategori', 'left');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->row();
	}

	public function add_produk($data)
	{
		$this->db->insert('tabel_produk', $data);
	}

	public function edit_produk($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('tabel_produk', $data);
	}

	public function delete_produk($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('tabel_produk', $data);
	}
}
