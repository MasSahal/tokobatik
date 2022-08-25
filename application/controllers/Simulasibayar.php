<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simulasibayar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pesanan','m_pesanan');
 

	}

	public function index()
	{
		$channel = $this->input->get('channel');
		$data = array(
				'title' => $channel,
				'isi' => 'v_simulasi'
			);
			$this->load->view('templateSimulasi/halaman', $data, FALSE);
	}

	public function cekdata()
	{
		$va_number = trim($this->input->post('va_number'));
		$channel = trim($this->input->post('channel'));
		$dataOrder = $this->m_pesanan->getTrxByVA($va_number);
		$data = array(
				'title' => $va_number,
				'va_number' => $va_number,
				'dataCek' => $dataOrder,
				'channel' => $channel,
				'isi' => 'v_simulasi _data'
			);
			$this->load->view('templateSimulasi/halaman', $data, FALSE);
	}

	public function bayar()
	{
		$va_number = trim($this->input->post('no_va'));
		$order_id = trim($this->input->post('no_order'));
		$channel = trim(strtoupper($this->input->post('channel')));
		$total_bayar = trim($this->input->post('total_bayar'));

		 
				

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => BASE_URL().'payment_notif/notifikasi',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		  "transaction_time": "'.date('Y-m-d H:i:s').'",
		  "transaction_status": "settlement",
		  "transaction_id": "26258d5c-5561-486f-98ca-0e05bd38281e",
		  "status_message": "midtrans payment notification",
		  "status_code": "200",
		  "bank" : "'.$channel.'",
		  "va_number" : "'.$va_number.'",
		  "va_numbers": [
		    {
		      "va_number": "'.$va_number.'",
		      "bank": "'.$channel.'"
		    }
		  ],
		  "signature_key": "43a1ec0c2131bbbb5c82262faa0a34541fff2912851ae09a91814b40e4691a552ab1a24696f5f1e421354616001e6a50651fd13d7367337dbdadc5de420b06ff",
		  "payment_type": "'.$channel.'",
		  "order_id": "'.$order_id.'",
		  "merchant_id": "G250429800",
		  "gross_amount": "'.$total_bayar.'",
		  "fraud_status": "accept",
		  "currency": "IDR"
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
 
 

		echo 'sukses bayar';
	}


 

}