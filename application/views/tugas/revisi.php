<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<center>
							<h4>UNGGAH REVISI</h4>
						</center>
						<hr>
						<p>Silahkan unggah revisi tugas anda</p>
						<?php if ($revisi->row("revisi") == null) { ?>
						<?php echo form_open_multipart('tugas/tambah_revisi');?>
							<input type="hidden" name="tipe" value="revisi">
							<div class="input-group input-group-sm mb-3">
								<input type="file" class="form-control form-control-sm" name="revisi" accept=".doc,.docx,.pdf">
							</div>
							<div class="input-group-append">
								<button type="submit" class="btn btn-sm btn-success">Unggah</button>
							</div>
						<?= form_close() ?>
						<?php } else { ?>
						<a href="#" class="btn btn-success btn-xm">Sudah Terupload</a>
						<a href="<?= base_url("tugas/hapusrevisi/".$this->session->id)?>" class="btn btn-danger btn-xm">Hapus revisi</a>
						<!-- /.card-body -->
						<?php } ?>
					</div>
					<!-- /.card -->
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
