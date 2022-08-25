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
    <div class="container container2" id="section-to-print">
      <div class="card card-solid mt-5">
        <div class="card-body pb-0">
          <br>
          <div class="row">      
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                   <?php
                  if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                  }
                  ?>
                  <h3 class="box-title">Data Detail Transaksi Penjualan</h3>
                </div><!-- /.box-header -->
                <div class="box-body scrollme">
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr><th width='140px' scope='row'>Kode Pembelian</th>  <td><?= $dataOrder[0]->no_order; ?></td></tr>
                        <tr><th scope='row'>Nama Konsumen</th>                 <td><?= $dataOrder[0]->nama_penerima; ?></td></tr>
                        <tr><th scope='row'>Waktu Transaksi</th>               <td> <?= date('d-m-Y H:i',strtotime($dataOrder[0]->tgl_order)); ?></td></tr>
                        <tr><th scope='row'>Kurir</th>               <td><?= $dataOrder[0]->ekspedisi.' '.$dataOrder[0]->paket; ?></td></tr>
                        <tr><th scope='row'>Ongkos Kirim</th><td>Rp <?= number_format($dataOrder[0]->ongkir,0,',','.'); ?></td></tr>
                        <tr><th width='140px' scope='row'>Channel Pembayaran</th>  <td><?= $dataOrder[0]->bank; ?></td></tr>
                        <tr><th width='140px' scope='row'>No VA / Kode Pembayaran</th>  <td><?= $dataOrder[0]->no_va; ?></td></tr>
                        <tr><th scope='row'>Status Bayar</th><td><?= $dataOrder[0]->status_bayar == "settlement" ? 'Lunas Dibayar' : $dataOrder[0]->status_bayar; ?></td></tr>
                        <tr>
                            <th scope='row'>Status Pesanan</th>
                            <td><?= $dataOrder[0]->status_order == "0" ? 'Menunggu Pembayaran' : $dataOrder[0]->status_order;?></td>
                        </tr>
                         <tr><th scope='row'>Nomor Resi</th><td><?=  $dataOrder[0]->no_resi; ?></td></tr>
                         <tr><th scope='row'>Aksi Pesanan</th><td><?php 
                          if(!in_array($dataOrder[0]->status_order, array("Selesai","0")))
                          {
                            echo in_array($dataOrder[0]->status_order,array("Menunggu Konfirmasi Admin",'dibayar')) ? '<a class="btn btn-primary" href="'.BASE_URL().'pesanan_admin/konfirmasi/konfirmasi/'.$dataOrder[0]->no_order.'">Konfirmasi Pesanan</a>' : '';
                            if(!in_array($dataOrder[0]->status_order, array("Sudah Dikirim",'dibayar','sampai')))
                            {
                              echo '<button data-bs-toggle="modal" data-bs-target="#prosesdikirim" type="button" class="btn btn-primary btn-sm"><i class="fas fa-box  "></i> Ubah Proses Dikirim</button>';
                            }else if(in_array($dataOrder[0]->status_order, array("sampai")))
                            {
                              echo '<a class="btn btn-primary" href="'.BASE_URL().'pesanan_admin/konfirmasi/selesai/'.$dataOrder[0]->no_order.'">Update Pesanan Selesai</a>';
                            }
                          } 
                         ?></td></tr>
                        </td></tr>
                      </tbody>
                    </table>
                     
                    <table class="table table-bordered table-striped table-condensed">
                      <thead>
                        <tr>
                          <th style='width:40px'>No</th>
                          <th>Nama Produk</th>
                          <th>Jumlah Barang</th>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $i = 1;
                         foreach ($dataOrder as $data) {
                          
                          echo '<tr>
                                  <td>'.$i.'</td>
                                  <td>'.$data->nama_produk.'</td>
                                  <td>'.$data->qty.'</td>
                                  <td>'.number_format($data->subtotal,0,",",".").'</td>
                                </tr>';
                          $i++;
                        } ?>

                        <tr>
                          <td colspan="3"><b>Total Harga</b></td> 
                          <td><b>Rp <?php echo number_format($dataOrder[0]->total_bayar,0,',','.')  ?></b></td>
                        </tr>
                      </tbody>
                    </table>
                    <a class='pull-right button btn btn-default btn-sm' href='<?php echo base_url() ?>/pesanan_admin'>Kembali</a>
                    
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
   

<!--modal add -->
<div class="modal fade" id="prosesdikirim">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Proses Order</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        echo form_open('pesanan_admin/konfirmasi/dikirim/'.$dataOrder[0]->no_order);
        ?>

        <div class="form-group">
          <label>No Resi Pengiriman</label>
          <input type="text" name="no_resi" class="form-control" placeholder="No Resi Pengiriman" required>
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>

      </div>
      <?php
      echo form_close();
      ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
 