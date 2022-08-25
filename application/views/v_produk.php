
<main id="main">      
  <!-- ======= Our Portfolio Section ======= -->
  <section id="portfolio" class="general">
    <div class="container">
      <div class="font-produk">
        <div class="font-produk">
          <h1 class="font-produk">Produk yang dijual</h1>
          <br>
          <br>

          <div class="row">
            <?php foreach ($produk as $key => $value) { ?>
              <div class="col-sm-4">
                <?php
                echo form_open('keranjang/add');
                echo form_hidden('id', $value->id_produk);
                echo form_hidden('qty', 1);
                echo form_hidden('price', $value->harga_produk);
                echo form_hidden('name', $value->nama_produk);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="card bg-cream">
                  <div class="walpaper-produk-header text-muted border-bottom-0">
                    <h5 class="font-produk"><b><?= $value->nama_produk ?></b></h5>
                    <p class="font-produk"><b>Kategori : </b><?= $value->nama_kategori ?></p>
                    <div class="col-sm-6">
                        <div class="text-right">
                          <h4><span class="button-add">Rp. <?= number_format($value->harga_produk, 0) ?></span></h4>
                          <br>
                        </div>
                    </div> 
                  </div>
                  <div class="card-body pt-0">
                    <div class="row"> 
                      <div class="col-12 text-center">
                        <a href="<?= base_url('buyer/produk/detail_produk/' . $value->id_produk)  ?>">
                          <img src="<?= base_url('assets/img/produk/' . $value->gambar_produk) ?>" width="350px" height="450px">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="walpaper-produk-footer">
                    <div class="row">
                    <div class="col-sm-4">
                        <div class="text-right">
                          <br>
                        </div>
                    </div>
                      <div class="col-sm-5">
                          <button><h4><span class="button-add swalDefaultSuccess"><i class="fas fa-cart-plus"> Add</i></span></h4></button>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                <?php echo form_close(); ?>
              </div>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Our Portfolio Section -->

<section id="contact" class="bg-form">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-10 " data-bs-aos="fade-right">
            <div class="section-title">
            <h2 class="font-produk">Ingin Beri Testimoni?</h2>
            </div>
          </div>

          <?php
					echo validation_errors('<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
					if ($this->session->flashdata('pesan')) {
						echo '<div class="alert alert-success alert-dismissible">';
						echo $this->session->flashdata('pesan');
						echo '</div>';
					}

		    	echo form_open('buyer/testimoni'); ?>
          <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-9" data-bs-aos="fade-up" data-bs-aos-delay="100">
                <form action="" method="post" role="form" class="php-email-form mt-4">
                <div class="form-group mt-3">
                    <input type="text" class="form-all" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukan Nama Anda.." required>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-all" name="subjek" value="<?= set_value('subjek') ?>" placeholder="Subject, cth: Transaksi, Produk, Etc.." required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-all" name="deskripsi" rows="5" value="<?= set_value('deskripsi') ?>" placeholder="Masukan Deskripsi.." required></textarea>
                </div>
                <br>
                <div class="text-center" class="btn-button" ><button type="submit"> Send Message</button></div>
                </form>
            </div>
          <?php echo form_close() ?>
        </div>
      </div>
  </section><!-- End Contact Section -->

<script src="<?= base_url() ?>template/produk/sweetalert2.min.js"></script>
<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Barang Berhasil Ditambahkan Ke Keranjang !!!'
			})
		});
	});
</script>