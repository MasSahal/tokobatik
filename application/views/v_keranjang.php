
<main id="main">      
  <!-- ======= Our Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container">
      <div class="card card-solid mt-5">
        <div class="card-body pb-0">
          <h3>Keranjang Saya</h3>
          <br>
          <div class="row">
      <div class="col-sm-12">
        <?php


        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-success">'.$this->session->flashdata('pesan').'</div>';
        }
        ?>
      </div>
      <div class="col-sm-12">
        <?php echo form_open('keranjang/update',array('id' => 'form_Cart')); ?>

        <table class="table" cellpadding="6" cellspacing="1" style="width:100%">

          <tr>
            <th>Nama Barang</th>
            <th style="text-align:right">Harga</th>
            <th style="text-align:right">Sub-Total</th>
            <th style="text-align:center">Berat</th>
            <th width="100px">Jumlah</th>
            <th class="text-center">Action</th>
          </tr>

          <?php $i = 1; ?>

          <?php
          $tot_berat = 0;
          foreach ($barang as $items) {            
            $berat    = $items['berat'];
            $tot_berat  = $tot_berat + $berat;
          ?>
            <tr>
              
              <td><?php echo $items['nama_produk']; ?></td>
              <td style="text-align:right">Rp. <?php echo number_format($items['harga_produk'], 0); ?></td>
              <td style="text-align:right">Rp. <?php echo  number_format($items['subtotal'], 0); ?></td>
              <td class="text-center"><?= $berat  ?> Gr</td>
              <td>
                <?php
                echo form_input(array(
                  'name' => $i . '[qty]',
                  'value' => $items['qty'],
                  'maxlength' => '3',
                  'min' => '0',
                  'size' => '5',
                  'type' => 'number',
                  'class' => 'form-control formInput'
                ));
                ?>
              </td>
              <td class="text-center">
                <a href="<?= base_url('keranjang/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
              </td>
            </tr>

            <?php $i++; ?>

          <?php } ?>

          <tr>
            <td class="right">
              <h3>Total :</h3>
            </td>
            <td class="right">
              <h3>Rp. <?php echo number_format($this->cart->total(), 0); ?></h3>
            </td>
            <th>Total Berat : <?= number_format($tot_berat,0,',','.') ?> Gr</th>
            <td></td>
            <td></td>
            <td></td>
          </tr>

        </table>

        <!-- <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update Cart</button> -->
        <a href="<?= base_url('keranjang/clear') ?>" class="btn btn-danger btn-flat"><i class="fa fa-recycle"></i> Kosongkan Keranjang</a>
        <a href="<?= base_url('keranjang/cekout')  ?>" class="btn btn-success btn-flat"><i class="fa fa-check-square"></i> Check Out</a>
        <?php echo form_close(); ?>
        <br>
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
  <script type="text/javascript">
  	$(function(){
	    $('.formInput').change(function(){ 
	    	$('#form_Cart').submit();
	    });
	});
  </script>
 