<main id="main">

    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-9 " data-bs-aos="fade-right">
                <div class="section-title">
                <h2>Pengajuan Laporan</h2>
                <br>
                <br>
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

			echo form_open('buyer/laporan'); ?>
            <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-9" data-bs-aos="fade-up" data-bs-aos-delay="100">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control"  placeholder="Nama Anda" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="E-mail Anda" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subjek" value="<?= set_value('subjek') ?>" placeholder="Subject, cth: Pengiriman, Transaksi, etc..." required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="deskripsi" rows="5" value="<?= set_value('deskripsi') ?>" placeholder="Deskripsi Pengajuan" required></textarea>
                </div>
                <br>
                <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>
            <?php echo form_close() ?>
            </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
