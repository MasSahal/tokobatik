<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_transaksi','m_transaksi');
		$this->load->model('model_buyer_produk','m_produk');
		
		//setting parameter untuk API midtrans
		$params = array('server_key' => MIDTRANS_SERVER_KEY, 'production' => IS_MIDTRANS_PRODUCTION);
		//load librart midtrans
		$this->load->library('midtrans');
		//assign parameter params ke konfig midtrans
		$this->midtrans->config($params);

	}

	public function index()
	{
		// jika data di cart kosong, maka redirect ke halaman produk
		// cart adalah libary bawaan codeigniter untuk kelola data keranjang
		if (empty($this->cart->contents())) {
			redirect('buyer/produk'); 
		}
		redirect('keranjang/lihat_keranjang'); 
	}

	// fungsi ini untuk membuka halaman cart/keranjang
	public function lihat_keranjang()
	{
		// jika data di cart kosong, maka redirect ke halaman produk
		// cart adalah libary bawaan codeigniter untuk kelola data keranjang
		if (empty($this->cart->contents())) {
			redirect('buyer/produk');  
		}

		$tot_berat = 0;
		$dataCart = array();
		foreach ($this->cart->contents() as $items) {
			$barang = $this->m_produk->detail_produk($items['id']);						 
			$berat 	=	 floatval($items['qty']) * floatval($barang->berat);

			$d['berat'] 	=  $berat;
			$d['tot_berat'] = $tot_berat; 

			$d['harga_produk'] 	= $barang->harga_produk; 
			$d['sub_total'] 	= floatval($items['qty']) * floatval($barang->harga_produk); 
			$d['nama_produk'] 	= $barang->nama_produk; 
			$d['id_produk'] 	= $barang->id_produk; 
			$d['subtotal'] 		= $items['subtotal']; 
			$d['rowid'] 		= $items['rowid'];
			$d['qty'] 			= $items['qty'];

			array_push($dataCart, $d); // masukan data $d ke array dataCart
		} 
		$data = array(
				'title' 	=> 'Cek Out Belanja',
				'isi' 		=> 'v_keranjang',
				'barang' 	=> $dataCart
		);
		$this->load->view('template/halaman', $data, FALSE);
	}

	// fungsi curl untuk akses rajaongkir
	public function requestDataRajaOngkir($url)
	{
		$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
			  CURLOPT_HTTPHEADER => array(
			    'key: '.API_KEY_RAJAONGKIR
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return json_decode($response);
	}

 

	// fungsi untuk menghitung ongkos kirim
	public function hitungOngkir()
	{
		$ekspedisi 	= $this->input->post('ekspedisi'); // jne / tiki / pos
		$provinsi 	= explode("#", $this->input->post('provinsi')); // pisah value berdasarkan karakter # menjadi array
		$berat 		= $this->input->post('berat');
		$kota 		= explode("#", $this->input->post('kota'));  // pisah value berdasarkan karakter # menjadi array
			
		$curl = curl_init();
		curl_setopt_array($curl, array(
			  CURLOPT_URL 				=> "https://api.rajaongkir.com/starter/cost",
			  CURLOPT_RETURNTRANSFER 	=> true,
			  CURLOPT_ENCODING 			=> "",
			  CURLOPT_MAXREDIRS 		=> 10,
			  CURLOPT_TIMEOUT 			=> 30,
			  CURLOPT_HTTP_VERSION 		=> CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST 	=> "POST",
			  CURLOPT_POSTFIELDS 		=> "origin=108&destination=".$kota[0]."&weight=".$berat."&courier=".strtolower($ekspedisi),
			  CURLOPT_HTTPHEADER 		=> array(
										    "content-type: application/x-www-form-urlencoded",
										    'key: '.API_KEY_RAJAONGKIR
										  ),
		));


		$response 	= curl_exec($curl); 	// ambil data dari raja ongkir
		$data 		= json_decode($response); // data dari rajaongkir dijadikan array 
		curl_close($curl);

		$dataOngkir = array();

		foreach ($data->rajaongkir->results[0]->costs as $key) {
			 $d['description'] 		= $key->description;
			 $d['services'] 		= $key->service;
			 $d['cost'] 			= $key->cost[0]->value ;
			 $d['cost_formatted'] 	= "Rp ".number_format($key->cost[0]->value,0,',','.') ;

			 array_push($dataOngkir, $d); // masukan data $d ke array dataOngkir
		}

		echo json_encode($dataOngkir); // jadikan array menjadi text json.
	}

	// fungsi untuk ambil list kota ke rajaongkir.
	public function listKota()
	{
		$provinsi 	= explode("#", $this->input->post('provinsi'));

		$url 		= 'https://api.rajaongkir.com/starter/city?province='.$provinsi[0];
		$dataProv 	= $this->requestDataRajaOngkir($url);

		echo json_encode($dataProv->rajaongkir->results);
	}

	 
	// fungsi untuk menambah data ke cart.
	public function add()
	{

		if(empty($this->session->userdata('id_buyer')))
		{
			$this->session->set_flashdata('pesan', 'Login terlebih dahulu');
			redirect('auth/login/login');
		}

		$id = $this->input->post('id');
		$barang 	= $this->m_produk->detail_produk($id);
		$redirect_page = $this->input->post('redirect_page');

		$stok = $barang->stok_produk;

		if($stok == 0)
		{
			echo "<script>alert('Stok Produk Kosong');</script>";
			redirect($redirect_page, 'refresh');

		}else if($stok < $this->input->post('qty'))
		{
			echo "<script>alert('Stok Produk tidak mencukupi');</script>";
			redirect($redirect_page, 'refresh');

		}



		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
		);
		
		$this->cart->insert($data); // insert data $data ke cart

		redirect($redirect_page, 'refresh');
	}

	public function delete($rowid) // hapus data didalam cart berdasarkan rowid, roeid adalah parameter bawaaan library cart yang bersifat unik tiap data
	{

		if(empty($this->session->userdata('id_buyer')))
		{
			$this->session->set_flashdata('pesan', 'Login terlebih dahulu');
			redirect('auth/login/login');
		}
		$this->cart->remove($rowid);
		redirect('buyer/produk');
	}

	// fungsi untuk mengupdate data cart
	public function update()
	{

		if(empty($this->session->userdata('id_buyer')))
		{
			$this->session->set_flashdata('pesan', 'Login terlebih dahulu');
			redirect('auth/login/login');
		}

		$i = 1; 
		foreach ($this->cart->contents() as  $items) {

			$id = $items['id'];
			$barang 	= $this->m_produk->detail_produk($id); 

			$stok = $barang->stok_produk; 
			if($this->input->post($i . '[qty]') > $stok)
			{
				$this->session->set_flashdata('pesan', 'Jumlah melebihi stok');
				redirect('keranjang/lihat_keranjang');

			}

			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $this->input->post($i . '[qty]'),
			);
			$this->cart->update($data);
			$i++;
		}
		$this->session->set_flashdata('pesan', 'Keranjang Berhasil Di Update !!!');
		redirect('keranjang/lihat_keranjang');
	}

	// fungsi untuk menghapus semua data cart
	public function clear()
	{
		$this->cart->destroy();
		redirect('keranjang/lihat_keranjang');
	}

	// fungsi ini untuk membuka halaman cekout yang ada di cart.
	// jika buyer belum login maka akan diarahkan ke halaman login.
	public function cekout()
	{

		if(empty($this->session->userdata('id_buyer')))
		{
			$this->session->set_flashdata('pesan', 'Login terlebih dahulu');
			redirect('auth/login/login');
		}
		
		// jika data cart/keranjang kosong maka akan diarahkan ke halaman produk
		if(empty($this->cart->contents()))
		{
			redirect('buyer/produk');

		}
		

			$tot_berat = 0;
			$dataCart = array();

			// ambil data didalam cart dan masukan ke array dataCart
			foreach ($this->cart->contents() as $items) {
				//ambil ke database untuk ambil detail produk berdasarkan id (id_produk) yang sudah ada didalam cart.
				$barang 	= $this->m_produk->detail_produk($items['id']);
				$berat 		= floatval($items['qty']) * floatval($barang->berat);
				$tot_berat 	= $tot_berat+$berat;

				$d['berat'] 		= floatval($items['qty']) * floatval($berat);
				$d['tot_berat'] 	= floatval($items['qty']) * floatval($barang->berat); 
				$d['harga_produk'] 	= $barang->harga_produk; 
				$d['nama_produk'] 	= $barang->nama_produk; 
				$d['id_produk'] 	= $barang->id_produk; 
				$d['subtotal'] 		= $items['subtotal']; 
				$d['sub_total'] 	= floatval($items['qty']) * floatval($barang->harga_produk); 
				$d['rowid'] 		= $items['rowid'];
				$d['qty'] 			= $items['qty'];

				array_push($dataCart, $d);
			} 

			//dihalaman cekout untuk mengisi data2 pengiriman dan perhitungan ongkos kirim, maka ambil data provinsi untuk ditampilkan didalam halaman cekout
			$url = 'https://api.rajaongkir.com/starter/province';
			$dataProv = $this->requestDataRajaOngkir($url);

			$data = array(
				'title' 		=> 'Cek Out Belanja',
				'isi' 			=> 'v_checkout',
				'dataCart' 		=> $dataCart,
				'tot_berat' 	=> $tot_berat,
				'data_provinsi' => $dataProv->rajaongkir->results
			);

			$this->load->view('template/halaman', $data, FALSE);
		 
	}

	/* fungsi jika tombol lanjutkan pembayaran di halaman cekout dikik, maka akan memanggil fungsi ini
	 	didalam fungsi ini akan memanggil / akses ke midtrans untuk mendapatkan token akses dimana token akses ini akan dilempar /ditangkap kembali oleh view halaman cekout.
	 	step nya : 
	 	1. simpan transaksi ke tabel tabel_order sebagai master order dan tabel_order_detail sebagai detail order.
	 	2. kirim data transaksi ke midtrans untuk mendapatkan token akses.
	 	3. echo / kirim token akses ke halaman view/v_checout.
	*/ 
	public function do_cekout()
	{
		$prov 		= explode("#", $this->input->post('provinsi'));
		$kota 		= explode("#", $this->input->post('kota'));
		$prov 		= explode("#", $this->input->post('provinsi'));
		$pengiriman = explode("#", $this->input->post('pengiriman'));
		$no_order 	= 'BTO'.$this->session->userdata('id_buyer').time(); // buat nomor order unik.
		$data 		= array(
						'id_buyer' 		=> $this->session->userdata('id_buyer'),
						'no_order' 		=> $no_order,
						'tgl_order' 	=> date('Y-m-d H:i:s'),
						'nama_penerima' => $this->input->post('nama_penerima'),
						'hp_penerima' 	=> $this->input->post('hp_penerima'),
						'provinsi' 		=> $prov[1],
						'kota' 			=> $kota[1],
						'alamat' 		=> $this->input->post('alamat_detail'),
						'kode_pos' 		=> $this->input->post('kode_pos'),
						'ekspedisi'		=> $this->input->post('ekspedisi'),
						'paket'			=> $pengiriman[1],
						'ongkir' 		=> $pengiriman[2],
						'berat' 		=> $this->input->post('berat'),
						'total_bayar' 	=> $this->input->post('total_harga'),
						'status_bayar' 	=> 'pending',
						'status_order' 	=> '0',
					);
		//simpan ke tabel transaksi
		$this->m_transaksi->simpan_transaksi($data);
			
		//simpan tiap item yang ada didalam cart ke tabel transaksi detail
		$i = 1; 
		foreach ($this->cart->contents() as $item) {
			$dataSubtotal 	= $this->m_transaksi->getDataProduk($item['id']);
			$subtotal 		= floatval($item['qty'])*floatval($dataSubtotal->harga_produk);
			$data_rinci 	= array(
				'no_order' 	=> $no_order,
				'id_barang' => $item['id'],
				'qty' 		=> $item['qty'],
				'subtotal' 	=> $subtotal,
			);

			$this->m_transaksi->simpan_rinci_transaksi($data_rinci); 

			
		}

			//hapus cart karena sudah disimpan ke transaksi. 
			$this->cart->destroy(); 

			//proses kirim data ke midtrans

			$transaction_details = array(				
					'gross_amount' => $this->input->post('total_harga'),
					'order_id' => $no_order, // kirim no order yg tadi sudah di buat, ini digunakan jika ada pemberitahuan 								pembayaran ke kita maka akan menjalankan update status pembayaran. 
			);


			$getUser = $this->m_transaksi->get_buyer($this->session->userdata('id_buyer'));
			$name = $this->input->post('nama_penerima');
			$email = $getUser->email;

				// Optional
			$customer_details = array(
				'first_name'    => $name, 
				'email'         => $email, 
			);
			$credit_card['secure'] = true;

			 
			// masukan data yang tadi dibentuk kedalam satu array dan lempar ke library midttrans
			$transaction_data = array(
				'transaction_details' => $transaction_details,
				'customer_details'   => $customer_details,
				'credit_card'        => $credit_card,
			);
 
 			// baris ini untuk mendapatkan data token akses yang diperlukan oleh halaman cekout
			$snapToken = $this->midtrans->getSnapToken($transaction_data); 
			echo json_encode(array('status_code' => '00', 'message' => 'sukses', 'token'=> $snapToken));
		
	}
	
}
