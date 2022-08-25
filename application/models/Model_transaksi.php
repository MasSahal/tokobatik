<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
	public function simpan_transaksi($data)
	{
		$this->db->insert('tabel_order', $data);
	} 

	public function simpan_rinci_transaksi($data)
	{
		$this->db->insert('tabel_order_detail', $data);
	} 

	public function get_buyer($id_buyer)
	{
		$this->db->select('*');
		$this->db->from('tabel_buyer')->where('id_buyer',$id_buyer);
		return $this->db->get()->row();
	}

	public function clearNotifMidtrans($order_id)
	{
		$this->db->where('order_id', $order_id);
		$this->db->delete('tabel_payment_notification');
	}

	public function getDataProduk($id_produk)
	{
		$this->db->select('*');
		$this->db->from('tabel_produk')->where(array('id_produk' => $id_produk));
		return $this->db->get()->row();
	}

	public function getDataProdukByNoOrder($order_id)
	{
		$this->db->select('*');
		$this->db->from('tabel_order_detail')
		->join('tabel_produk','tabel_produk.id_produk = tabel_order_detail.id_barang')
		->where(array('no_order' => $order_id));
		return $this->db->get()->row();
	}

	public function kurangi_stok_barang($id_produk,$data)
	{

		$this->db->where('id_produk', $id_produk);
		$this->db->update('tabel_produk', $data);
	}


	public function insertNotifMidtrans($data)
	{
		$this->db->insert('tabel_payment_notification', $data);
			$status_order = $data['transaction_status'];
			$data2 = array(
               'status_bayar' => $data['transaction_status'],
               'bank'		=> strtoupper($data['bank']),
               'no_va'		=> $data['va_number'],
            );

			if($data['transaction_status'] == "pending")
			{
					$status_order = 'Menunggu Pembayaran';
			}else if($data['transaction_status'] == "settlement")
			{
					$status_order = 'dibayar';
					$data2 = array(
	               'status_bayar' => $data['transaction_status'],
	               'bank'		=> strtoupper($data['bank']),
	               'no_va'		=> $data['va_number'],
	               'status_order' => 'dibayar'
	            );

			}
			
		$this->db->where('no_order', $data['order_id']);
		$this->db->update('tabel_order', $data2);
	} 


 
}
