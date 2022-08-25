
<div class="col-md-12 mt-5">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title mt-5">Laporan Testimoni</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			}


			?>
			<table class="table table-bordered" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama</th>
                        <th>Subject</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($testimoni as $key => $value) { ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td><?= $value->nama ?></td>
                            <td><?= $value->subjek ?></td>
                            <td><?= $value->deskripsi ?></td>
                            <td class="text-center">
								<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_testimoni ?>"><i class="fas fa-trash"></i></button>
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
<?php foreach ($testimoni as $key => $value) { ?>
	<div class="modal fade" id="delete<?= $value->id_testimoni ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<h5>Yakin ingin menghapus data ini?</h5>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
					<a href="<?= base_url('testimoni/delete/' . $value->id_testimoni) ?>" class="btn btn-primary">Delete</a>
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php } ?>