<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_pesanan extends CI_Model
{
	 

	public function getAllOrder($id_buyer)
	{
		$this->db->select('*')
		->from('tabel_order')
		->where(array('id_buyer' => $id_buyer))
		->order_by('tabel_order.tgl_order','desc');
		return $this->db->get()->result();
	}



	public function getOrderDetail($no_order)
	{
		$this->db->select('tabel_order.*,tabel_order_detail.*,tabel_produk.nama_produk')
		->from('tabel_order')
		->join('tabel_order_detail','tabel_order_detail.no_order = tabel_order.no_order')
		->join('tabel_produk','tabel_produk.id_produk = tabel_order_detail.id_barang')
		->where('tabel_order.no_order',$no_order);
		return $this->db->get()->result();
	}

	public function getAllOrderAdmin()
	{
		$this->db->select('*')
		->from('tabel_order')
		->join('tabel_buyer','tabel_buyer.id_buyer = tabel_order.id_buyer')
		->order_by('tabel_order.tgl_order','desc');
		return $this->db->get()->result();
	}

	public function konfirmasiOrder($no_order,$data)
	{
		$this->db->where('no_order', $no_order);
		$this->db->update('tabel_order', $data);
	}

	public function hapusPesanan($no_order)
	{
		$this->db->where('no_order', $no_order);
		$this->db->delete('tabel_order');
	}

	public function getTrxByVA($no_va)
	{
		$this->db->select('tabel_order.*,tabel_order_detail.*')
		->from('tabel_order')
		->join('tabel_order_detail','tabel_order_detail.no_order = tabel_order.no_order')
		->where('tabel_order.no_va',$no_va);
		return $this->db->get()->row();
	}
}
