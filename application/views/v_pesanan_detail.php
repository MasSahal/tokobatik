<style>
 
.container2 {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
 
label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.button {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.button:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

 
</style>
<main id="main">      
  <!-- ======= Our Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container">
      <div class="card card-solid mt-5">
        <div class="card-body pb-0">
          <br>
          <div class="row">
             <div class="col-sm-12">
        <?php


        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-success">'.$this->session->flashdata('pesan').'</div>';
        }
        ?>
      </div>
          </div>
          <div class="row">      
            <div class="col-sm-12">
              <center><h3>Data Pembelian</h3></center><h5>No Order : <?= $no_order ?></h5>
              <div class="row">
                <div class="col-75">
                  <div class="container2">
                    <h5>Penerima</h5>
                    <table>
                      <tr>
                        <td width="250px">Nama Penerima</td>
                        <td>:</td><td><?=$dataOrder[0]->nama_penerima;?></td>
                      </tr>
                      <tr>
                        <td width="250px">No HP</td>
                        <td>:</td><td><?=$dataOrder[0]->hp_penerima;?></td>
                      </tr>
                      <tr>
                        <td width="250px" valign="top">Alamat Detail</td>
                        <td valign="top">:</td><td><?=$dataOrder[0]->alamat.'<br>'.$dataOrder[0]->kota
                        .'<br>'.$dataOrder[0]->provinsi.','.$dataOrder[0]->kode_pos;?></td>
                      </tr>
                    </table>
                    <hr>
                    <h5>Informasi Pembayaran</h5>
                    <table>
                      <tr>
                        <td width="250px">Tanggal Order</td>
                        <td>:</td><td><?=date('d-m-Y H:i',strtotime($dataOrder[0]->tgl_order));?></td>
                      </tr>
                      <tr>
                        <td width="250px">Nomor Invoice</td>
                        <td>:</td><td><?=$dataOrder[0]->no_order;?></td>
                      </tr>
                      <tr>
                        <td width="250px">Nama Bank</td>
                        <td>:</td><td><?=$dataOrder[0]->bank;?></td>
                      </tr>
                      <tr>
                        <td width="250px">Nomor Virtual Account</td>
                        <td>:</td><td><?=$dataOrder[0]->no_va;?></td>
                      </tr>
                      <tr>
                        <td width="250px">Jumlah Bayar</td>
                        <td>:</td><td>Rp <?=number_format($dataOrder[0]->total_bayar,0,',','.');?></td>
                      </tr> 
                    </table>
                    <hr>
                    <h5>Detail Barang</h5>
                    <table>
                      <?php foreach ($dataOrder as $data) {
                        ?>
                        <tr>
                          <td width="250px">Nama Barang</td>
                          <td>:</td><td><?= $data->nama_produk; ?></td>
                        </tr>
                        <tr>
                          <td width="250px">Jumlah</td>
                          <td>:</td><td><?= $data->qty; ?></td>
                        </tr>
                        <tr>
                          <td width="250px">Sub Total Harga</td>
                          <td>:</td><td>Rp <?= number_format($data->subtotal,0,',','.'); ?></td>
                        </tr>
                        <tr>
                          <td colspan="3"><hr></td>
                        </tr>

                        <?php
                      } ?>


                      
                    </table>
                    <hr>
                    <h5>Pengiriman</h5>
                    <table>
                      <tr>
                        <td width="250px">Status Pesanan</td>
                        <td>:</td><td><?= $dataOrder[0]->status_order  == "0" ? 'Belum Dibayar' : $dataOrder[0]->status_order;?></td>
                      </tr> 
                      <tr>
                        <td width="250px">Nama Ekspedisi</td>
                        <td>:</td><td><?=$dataOrder[0]->ekspedisi;?></td>
                      </tr>
                      <tr>
                        <td width="250px">Paket</td>
                        <td>:</td><td><?=$dataOrder[0]->paket;?></td>
                      </tr>
                      <tr>
                        <td width="250px">Ongkos Kirim</td>
                        <td>:</td><td>Rp <?=number_format($dataOrder[0]->ongkir,0,',','.');?></td>
                      </tr> 
                      <tr>
                        <td width="250px">Nomor Resi</td>
                        <td>:</td><td>Rp <?=$dataOrder[0]->no_resi;?></td>
                      </tr> 
                      <tr><td width="250px">Aksi Pesanan</td><td>:</td><td><?php 
                          if(in_array($dataOrder[0]->status_order, array("Sudah Dikirim")))
                          {
                            echo '<a class="btn btn-primary" href="'.BASE_URL().'pesanan/konfirmasi/sampai/'.$dataOrder[0]->no_order.'">Update Pesanan Sampai</a>';
                          }else{
                            echo '-';
                          }
                         ?></td></tr>
                    </table>

                    <a class="button btn  btn-succes" href="<?= BASE_URL() ?>pesanan">Kembali</a>
                  </div>
                </div>                 
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section><!-- End Our Portfolio Section -->

<section id="contact" class="contact">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-9 " data-bs-aos="fade-right">
            
            <br>
          </div>
 
          <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-9" data-bs-aos="fade-up" data-bs-aos-delay="100">
                 
            </div> 
        </div>
      </div>
  </section><!-- End Contact Section -->
   
 