<section id="contact" class="bg-form">
      <div class="container">
        <div class="row justify-content-center text-center mb-7">
          <div class="col-lg-10 " data-bs-aos="fade-right">
            <div class="section-title">
            <h2 class="font-produk">Form Register</h2>
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
		    	echo form_open('auth/login/register'); ?>

          <div class="row justify-content-center text-center mb-7">
          <div class="col-lg-9" data-bs-aos="fade-up" data-bs-aos-delay="100">
                <form action="" method="post" role="form" class="php-email-form mt-7">
                <div class="form-group mt-3">
                    <input type="text" class="form-all" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukan Nama Anda..." required>
					<div class="input-group-append">
				</div>
				<div class="form-group mt-3">
                    <input type="email" class="form-all" name="email" value="<?= set_value('email') ?>" placeholder="Masukan Email Anda..." required>
					<div class="input-group-append">
				</div>
                <div class="form-group mt-3">
                    <input type="password" class="form-all" name="password" value="<?= set_value('password') ?>" placeholder="Masukan Password Anda..." required>
					<div class="input-group-append">
				</div>
				<div class="form-group mt-3">
                    <input type="password" class="form-all" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" placeholder="Ulangi Password Anda..." required>
					<div class="input-group-append">
				</div>
                <br>
                <div class="text-center" class="btn-button" ><button type="submit"> Register</button></div>
                </form>
            </div>
          <?php echo form_close() ?>
		  <br>
		  <a href="<?= base_url('auth/login/login') ?>" class="text-center">Sudah Punya Akun?</a>
        </div>
      </div>
  </section><!-- End Contact Section -->

