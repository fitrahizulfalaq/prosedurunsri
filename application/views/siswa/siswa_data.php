<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<!-- Profile Image -->
				<div class="card-header">
				<?php if ($this->session->userdata('tipe_user') == "2") { ?>
					<a href="<?= base_url('siswa/tambah'); ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a>
				<?php } ?>
			</div>
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<table class="table table-bordered table-striped" id="example3">
							<!-- <thead>
								<tr>
									<th>Nama</th>
									<th>Kode</th>
								</tr>
							</thead> -->
							<tbody>
								<?php
								$no = 1;
								foreach ($row->result() as $key => $data) {;
								?>
									<tr>
										<td scope="row">
											<span class="badge badge-warning"><?= $data->kode ?></span><br>
											<small><?= $data->username?></small><br>
											<?= $data->nama ?>
											<br>
											<a href="<?= site_url('siswa/edit/' . $data->id); ?>" class="btn btn-sm btn-warning btn-xs"><i class='fas fa-edit'></i></a>
											<!-- <a href="<?= site_url('siswa/hapus/' . $data->id); ?>" class="btn btn-sm btn-danger btn-xs" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a> -->
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
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
