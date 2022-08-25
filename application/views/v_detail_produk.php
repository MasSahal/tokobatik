<!-- Default box -->
<br>
<br>
<br>
<div class="card card-solid">
	<div class="card-body">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-7 mt-5">
				<h3 class="d-inline-block d-sm-none"><?= $produk->nama_produk ?></h3>
				<div class="center">
					<img src="<?= base_url('assets/img/produk/' . $produk->gambar_produk) ?>" class="product-image" alt="Product Image"  width="850px" height="600px">
				</div>
				<!-- <div class="col-12 product-image-thumbs">
					<div class="product-image-thumb active"><img src="<?= base_url('assets/img/produk/gambar_produk/' . $produk->gambar_produk) ?>" alt="Product Image"></div>
					<?php foreach ($gambar as $key => $value) { ?>
						<div class="product-image-thumb"><img src="<?= base_url('assets/img/produk/' . $value->gambar_produk) ?>" alt="Product Image"></div>
					<?php } ?>
				</div> -->
			</div>
			<div class="row justify-content-center">
			<div class="col-12 col-sm-6">
				<br>
				<h3 class="row justify-content-center"><?= $produk->nama_produk ?></h3>
				<hr>
				<h5>Kategori: <?= $produk->nama_kategori ?></h5>
				<hr>
				<h5>Berat: <?= $produk->berat ?> gram</h5>
				<hr>
				<p><?= $produk->deskripsi ?></p>
				<hr>
				<div class="bg-gray py-2 px-3 mt-4">
					<h2 class="mb-0">
						Rp. <?= number_format($produk->harga_produk, 0) ?>.00
					</h2>
				</div>
				<hr>
				<?php
				echo form_open('keranjang/add');
				echo form_hidden('id', $produk->id_produk);
				echo form_hidden('price', $produk->harga_produk);
				echo form_hidden('name', $produk->nama_produk);
				echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
				?>
				<div class="mt-4">
					<div class="row">
						<div class="col-sm-2">
							<input type="number" name="qty" class="form-control" value="1" min="1">
						</div>
						<div class="col-sm-10 row justify-content-center">
							<button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
								<i class="fas fa-cart-plus fa-lg mr-2"></i>
								Add to Cart
							</button>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
			</div>
		</div>

	</div>
	<!-- /.card-body -->
</div>

<script src="<?= base_url() ?>template/produk/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>template/produk/demo.js"></script>
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
				title: 'produk Berhasil Ditambahkan Ke Keranjang !!!'
			})
		});
	});
</script>
