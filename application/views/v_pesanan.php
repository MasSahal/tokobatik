
<main id="main">      
  <!-- ======= Our Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container">
      <div class="card card-solid mt-5">
        <div class="card-body pb-0">
          <h3>Pesanan Saya</h3>
          <br>
           <?php
                  if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                  }
                  ?>
          <div class="row">
      <div class="col-sm-12 scrollme" >
        <table class="table" cellpadding="6" cellspacing="1" style="width:100%">
          <tr>
            <th>No</th>
            <th>No Order</th>
            <th>Tanggal Order</th>
            <th style="text-align:right">Total Harga</th>
            <th>Nama Bank</th> 
            <th>Nomor Virtual Account</th> 
            <th>Status Bayar</th>
            <th>Status Pengiriman</th> 
            <th>Detail</th> 
          </tr>
          <?php $i = 1;
          foreach ($dataOrder as $items) { 
	          ?>
	            <tr>              
	              <td><?php echo $i; ?></td>
	              <td><?php echo $items->no_order; ?></td>
	              <td><?php echo date('d-m-Y H:i',strtotime($items->tgl_order)); ?></td>
	              <td style="text-align:right">Rp <?php echo number_format($items->total_bayar,0,',','.'); ?></td> 
	              <td><?php echo $items->bank; ?></td>
	              <td><?php echo $items->no_va; ?></td>
	              <td><?php echo $items->status_bayar == 'settlement' ? 'Dibayar' : $items->status_bayar; ?></td>
	              <td><?php echo $items->status_order == "0" ? 'Menunggu Pembayaran' : $items->status_order; ?></td>
	              <td><a href="<?= BASE_URL(); ?>pesanan/detail/<?= $items->no_order ?>"><i class="fa-solid fa-eye"></i>  </a>
                <?php if(strtolower($items->status_bayar) == "pending"){ ?> &nbsp;&nbsp;<a href="<?= BASE_URL(); ?>pesanan/hapus_pesanan/<?= $items->no_order ?>"><i class="fa-solid fa-trash" alt="Batalkan Pesanan"></i>  </a> <?php } ?>
              </td>
	            </tr>

	           <?php $i++;   
	      } ?>

        </table>
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
 