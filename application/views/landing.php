<main id="main">
    <section class="section bg-home" style="background: #e6ccb2;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-3">
                    <div class="card">
                        <img src="https://unsplash.it/500/700" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-6 pb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- <img src="assets/img/blog2.jpg" alt="Image" class="gambar"> -->
                                <img src="https://unsplash.it/500/350" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <img src="https://unsplash.it/500/350" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <img src="https://unsplash.it/1000/300" class="img-fluid" />
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section" style="background: #ede0d4;">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-5" data-bs-aos="fade-up">
                    <h2 class="section-heading">Keunggulan Belanja Disini!</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4" data-bs-aos="fade-up" data-bs-aos-delay="">
                    <div class="feature-1 text-center">
                        <i class="fas fa-box-full fa-2x   "></i>
                        <h3 class="mb-3">Langsung Pengrajin</h3>
                        <p>Batik Wong Trusmi merupakan sebuah website perkumpulan pengrajin Batik Trusmi untuk memasarkan batik via online.</p>
                    </div>
                </div>
                <div class="col-md-4" data-bs-aos="fade-up" data-bs-aos-delay="100">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-brightness-high"></i>
                        </div>
                        <h3 class="mb-3">Harga Terjangkau</h3>
                        <p>Karena langsung dari pengrajin, harga jual ditentukan oleh pengrajin langsung.</p>
                    </div>
                </div>
                <div class="col-md-4" data-bs-aos="fade-up" data-bs-aos-delay="200">
                    <div class="feature-1 text-center">
                        <div class="wrap-icon icon-1">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h3 class="mb-3">Kualitas Terbaik</h3>
                        <p>Tidak diragukan lagi, kualitas batik yang dijual adalah yang terbaik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ======= Blog ======= -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 me-auto">
                    <h2 class="mb-4">Apa Itu Batik Trusmi?</h2>
                    <p class="mb-4">Batik Trusmi Cirebon merupakan salah satu batik yang terkenal di Indonesia.
                        Lokasi pembuatannya terpusat di Kecamatan Plered, sekitar empat kilometer di sebelah barat pusat Kota Cirebon, Jawa Barat.
                        Kepopuleran ini membuat daerah asalnya mendapat julukan Kampung Batik Trusmi.</p>
                    <p><a href="<?= base_url('home/halaman1') ?>" class="btn-button">See More</a></p>
                </div>
                <div class="col-md-6" data-bs-aos="fade-left">
                    <img src="assets/img/bg.jpg" alt="Image" class="gambar">
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 ms-auto order-2">
                    <h2 class="mb-4">Batik Luntur? Begini cara Mengatasinya!</h2>
                    <p class="mb-4">Sebagai pengguna batik, Anda wajib tahu cara mencuci dan merawat baju batik.
                        Sebab, berbeda dengan pakaian biasa, batik butuh perawatan khusus agar desain dan warnanya tidak mudah luntur.
                        Berikut 7 tips mudah menjaga warna kain batik Anda tetap cemerlang.</p>
                    <p><a href="<?= base_url('home/halaman2') ?>" class="btn-button">See More</a></p>
                </div>
                <div class="col-md-6" data-bs-aos="fade-right">
                    <img src="assets/img/blog2.jpg" alt="Image" class="gambar">
                </div>
            </div>
        </div>
    </section>

    <section id="cta" class="cta">
        <div class="container">
            <div class="text-center" data-bs-aos="zoom-in">
                <h3>Ingin Dapat Diskon Besar?</h3>
                <p>Masukan nama dan barang yang ingin diberi diskon!</p>
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-lg-9" data-bs-aos="fade-up" data-bs-aos-delay="100">
                        <form action="<?= BASE_URL() ?>cta" method="post" role="form" target="_blank">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="nama" class="form-all" placeholder="Nama Anda" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-all" name="barang" placeholder="Mau Diskon Apa?" required>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="nomor" value="6289601551755">
                            <button type="submit" class="cta-btn">KLIK DISINI!</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-9 " data-bs-aos="fade-right">
                    <div class="section-title">
                        <h2>Ingin Beri Saran?</h2>
                    </div>
                    <br>
                </div>

                <?php
                echo validation_errors('<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }

                echo form_open('buyer/saran'); ?>
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-lg-9" data-bs-aos="fade-up" data-bs-aos-delay="100">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-all" placeholder="Nama Anda" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-all" name="email" value="<?= set_value('email') ?>" placeholder="E-mail Anda" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-all" name="subjek" value="<?= set_value('subjek') ?>" placeholder="Subject, cth: Website, Transaksi, etc..." required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-all" name="deskripsi" rows="5" value="<?= set_value('deskripsi') ?>" placeholder="Masukan Saran" required></textarea>
                            </div>
                            <br>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
    </section><!-- End Contact Section -->