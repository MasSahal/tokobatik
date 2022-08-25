<div class="col-md-12 mt-5">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Form Edit Produk</h3>
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

			echo form_open_multipart('produk/edit/' . $produk->id_produk) ?>
			<div class="form-group">
				<label>Nama produk</label>
				<input name="nama_produk" class="form-control" placeholder="Nama produk" value="<?= $produk->nama_produk  ?>">
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label>Kategori</label>
						<select name="id_kategori" class="form-control">
							<option value="<?= $produk->id_kategori ?>"><?= $produk->nama_kategori ?></option>
							<?php foreach ($kategori as $key => $value) { ?>
								<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Harga</label>
						<input name="harga_produk" class="form-control" placeholder="Harga produk" value="<?= $produk->harga_produk ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Stok</label>
						<input type="number" name="stok_produk" min="0" class="form-control" placeholder="Stok Produk (Satuan)" value="<?= $produk->stok_produk ?>">
					</div>
				</div>
                <div class="col-sm-4">
					<div class="form-group">
						<label>Diskon</label>
						<input name="diskon" class="form-control" placeholder="Diskon Produk" value="<?= $produk->diskon ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label>Berat</label>
						<input name="berat" class="form-control" placeholder="Berat Produk" value="<?= $produk->berat ?>">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Deskripsi produk</label>
				<textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi produk"><?= preg_replace('#<br\s*/?>#i', "", $produk->deskripsi) ?></textarea>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Gambar Produk</label>
						<input type="file" name="gambar" class="form-control" id="preview_gambar">
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<img src="<?= base_url('assets/img/produk/' . $produk->gambar_produk) ?>" id="gambar_load" width="400px">
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
