<br>
<br>

<div class="col-md-12 mt-5">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Form Add Porduk</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			//notifikasi form kosong
			echo validation_errors('<div class="alert alert-danger alert-dismissible">');
			//notifikasi gagal upload gambar
			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
				<h5>' . $error_upload . '</h5> </div>';
			}

			echo form_open_multipart('produk/add') ?>
			<div class="form-group">
				<label>Nama produk</label>
				<input name="nama_produk" class="form-control" placeholder="Nama produk" value="<?= set_value('nama_produk') ?>">
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label>Kategori</label>
						<select name="id_kategori" class="form-control">
							<option value="">--Pilih Kategori--</option>
							<?php foreach ($kategori as $key => $value) { ?>
								<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Harga</label>
						<input name="harga_produk" class="form-control" placeholder="Harga produk" value="<?= set_value('harga_produk') ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Stok (satuan)</label>
						<input type="number" name="stok_produk" min="0" class="form-control" placeholder="Stok produk" value="<?= set_value('stok_produk') ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
						<div class="form-group">
							<label>Diskon</label>
							<input name="diskon" class="form-control" placeholder="Diskon produk" value="<?= set_value('diskon') ?>">
						</div>
				</div>
				<div class="col-sm-4">
						<div class="form-group">
							<label>Berat</label>
							<input name="berat" class="form-control" placeholder="Berat produk" value="<?= set_value('berat') ?>">
						</div>
				</div>
			</div>

			<div class="form-group">
				<label>Deskripsi produk</label>
				<textarea name="deskripsi" class="form-control" rows="7" placeholder="Deskripsi produk"><?= set_value('deskripsi') ?></textarea>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Gambar Produk</label>
						<input type="file" name="gambar" class="form-control" id="preview_gambar" required>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<img src="<?= base_url('assets/img/foto/nana.jpg') ?>" id="gambar_load" width="300px">
					</div>
				</div>
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				<a href="<?= base_url('produk') ?>" class="btn btn-success btn-sm">Kembali</a>
			</div>

			<?php echo form_close() ?>
		</div>
	</div>
</div>

<script>
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#gambar_load').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#preview_gambar").change(function() {
		bacaGambar(this);
	});
</script>
