<br>
<br>
<br>
<br>

<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data produk </h3>

			<div class="card-tools">
				<a href="<?= base_url('produk/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			}


			?>
			<table class="table table-bordered" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Kategori</th>
						<th>Harga</th>
                        <th>Stok</th>
                        <th>Diskon</th>
						<th>Deskripsi</th>
						<th>Gambar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($produk as $key => $value) { ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td>
								<?= $value->nama_produk ?><br>
							</td>
							<td class="text-center"><?= $value->nama_kategori ?></td>
							<td class="text-center">Rp. <?= number_format($value->harga_produk, 0) ?></td>
                            <td class="text-center"><?= $value->stok_produk ?></td>
                            <td class="text-center"><?= $value->diskon ?></td>
							<td class="text-center"><?= $value->deskripsi ?></td>
							<td class="text-center"><img src="<?= base_url('assets/img/produk/' . $value->gambar_produk) ?>" width="150px"></td>
							<td class="text-center">
								<a href="<?= base_url('produk/edit/' . $value->id_produk) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_produk ?>"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>



<!--modal delete -->
<?php foreach ($produk as $key => $value) { ?>
	<div class="modal fade" id="delete<?= $value->id_produk ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete <?= $value->nama_produk ?></h4>
				</div>
				<div class="modal-body">


					<h5>Yakin ingin menghapus data ini?</h5>


				</div>
				<div class="modal-footer justify-content-between">
					<a href="<?= base_url('produk/delete/' . $value->id_produk) ?>" class="btn btn-primary">Delete</a>
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php } ?>
