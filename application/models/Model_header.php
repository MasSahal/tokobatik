<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_header extends CI_Model
{
	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tabel_produk');
		$this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_produk.id_kategori', 'left');
		$this->db->order_by('tabel_produk.id_produk', 'desc');
		return $this->db->get()->result();
	}

    public function get_all_data_kategori()
	{
		$this->db->select('*');
		$this->db->from('tabel_kategori');
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get()->result();
	}

	public function kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tabel_kategori');
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get()->row();
	}

    public function get_all_data_produk($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tabel_produk');
		$this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_produk.id_kategori', 'left');
		$this->db->where('tabel_produk.id_kategori', $id_kategori);
		return $this->db->get()->result();
	}

	



}
