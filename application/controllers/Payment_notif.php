<?php

/* 
	class untuk menerima dan memproses data notifikasi pembayaran dari midtrans. 
    notifikasi pembayaran adalah data pembayaran yang dikirim oleh midtrans untuk kita kelola
    notifikasi pembayaran akan dikirim oleh midtrans jika user sudah melakukan pembayaran.
*/

class Payment_notif extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('model_transaksi','m_transaksi');
		 $this->load->model('model_buyer_produk','m_produk'); 

	}

	function notifikasi()
	{
		// ambil data dari midtrans yang bentuknya json diubah ke php input
		$data 	= file_get_contents('php://input');
		$dt 	= json_decode($data); // jadikan json menjadi array

		// pengambilan data notifikasi pembayarn
		  $transaction_status 	= isset($dt->transaction_status) ? $dt->transaction_status : "";
		  $transaction_id 		= isset($dt->transaction_id) ? $dt->transaction_id : "";
		  $status_message 		= isset($dt->status_message) ? $dt->status_message : "";
		  $status_code 			= isset($dt->status_code) ? $dt->status_code : "";
		  $payment_type 		= isset($dt->payment_type) ? $dt->payment_type : "";
		  $order_id 			= isset($dt->order_id) ? $dt->order_id : "";
		  $transaction_time 	= isset($dt->transaction_time) ? $dt->transaction_time : "";
		  $merchant_id 			= isset($dt->merchant_id) ? $dt->merchant_id : "";
		  $gross_amount 		= isset($dt->gross_amount) ? $dt->gross_amount : "";
		  $bill_key 			= isset($dt->bill_key) ? $dt->bill_key : "";
		  $biller_code 			= isset($dt->biller_code) ? $dt->biller_code : "";
		  $permata_va_number 	= isset($dt->permata_va_number) ? $dt->permata_va_number : "";
		  $va_number 			= isset($dt->va_numbers[0]->va_number) ? $dt->va_numbers[0]->va_number : "";
		  $bank 				= isset($dt->va_numbers[0]->bank) ? $dt->va_numbers[0]->bank : "";

		  $payment_code 	= isset($dt->payment_code) ? $dt->payment_code : "";
		  $store 			= isset($dt->store) ? $dt->store : "";


		 //proses mapping nomor VA
		$nomor_va = "";
		if($va_number != "")
		{
		  $nomor_va = $va_number;
		}else if($permata_va_number != "") //handle untuk bank permata
		{
		  $nomor_va = $permata_va_number;
		  $bank = "Permata";
		}else if($biller_code != "")//handle untuk bank mandiri
		{
		  $nomor_va = $biller_code;
		}

		if($payment_type == "echannel")
		{
		  $bank = "Mandiri";
		  $nomor_va = $biller_code.$bill_key;
		}else if($payment_type == "gopay")
		{
		  $bank = "Gopay";
		  $nomor_va = "-";
		}

		if($payment_type == "cstore")
		{
		  $bank = "Indomaret/Alfamart";
		  $nomor_va = $payment_code;

		}

		// hapus notifikasi sebelumnya agar tidak dobel data
		$cekOrderId 	= $this->m_transaksi->clearNotifMidtrans($order_id);

		// insert ke tabel notifikasi untuk log data kita.
		$dataInsertNotif = array(
			'transaction_status' => $transaction_status,
			'order_id' 			=> $order_id,
			'transaction_time' 	=> $transaction_time,
			'va_number' 		=> $nomor_va,
			'bank' 				=> $bank,
			'transaction_id' 	=> $transaction_id,
			'payment_type' 		=> $payment_type,
			'status_code' 		=> $status_code,
			'gross_amount' 		=> $gross_amount,
			'status_message' 	=> $status_message
		);

		// insert tabel log sekaligus update status pembayaran dan status order.
		$this->m_transaksi->insertNotifMidtrans($dataInsertNotif,$order_id,$transaction_status);

		if($transaction_status == "settlement")
		{
			$barang 	= $this->m_transaksi->getDataProdukByNoOrder($order_id); 

			$stok = $barang->stok_produk; 
			$qty = $barang->qty; 
			$id = $barang->id_barang; 
			$this->m_transaksi->kurangi_stok_barang($id,array('stok_produk' => $stok-$qty)); 
		}


	}

}