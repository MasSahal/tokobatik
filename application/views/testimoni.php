<main id="main">
    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <h2 class="display-4">Testimoni</h2>
                <p>Testimoni kami langsung di tulis oleh pembeli sehingga terpercaya dan dapat dipertanggung jawabkan.</p>
              </div>
            </div>
          </div>
          <?php foreach ($testimoni as $key => $value) { ?>
          <div class="col-lg-4 text-center mb-5">
          <?php
                        echo form_hidden('id', $value->id_testimoni);
                        echo form_hidden('nama', $value->nama);
                        echo form_hidden('subjek', $value->subjek);
                        echo form_hidden('deskripsi', $value->deskripsi);
                        ?>
                        <h4><?= $value->nama ?></h4>
                        <span class="d-block mb-3 text-uppercase"><?= $value->subjek ?></span>
                        <p><?= $value->deskripsi?></p>
                        <?php echo form_close(); ?>
          </div>
          <?php } ?>
      </div>
     </div>
    </section>
  </main><!-- End #main -->
