<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<center>
							<h4>UNGGAH TUGAS AKHIR</h4>
						</center>
						<hr>
						<?php if ($tugasakhir->row("tugasakhir") == null) { ?>
						<p>Silahkan unggah TUGAS AKHIR anda</p>
						<?php echo form_open_multipart('tugas/tambah_tugasakhir');?>
							<input type="hidden" name="tipe" value="tugasakhir">
							<div class="input-group input-group-sm mb-3">
								<input type="file" class="form-control form-control-sm" name="tugasakhir" accept=".doc,.docx,.pdf">
							</div>
							<div class="input-group-append">
								<button id="btn-submit" type="submit" class="btn btn-sm btn-success" onclick="document.getElementById('btn-submit').innerHTML='Proses Upload'">Unggah</button>
							</div>
						<?= form_close() ?>
						<?php } else { ?>
						<a href="#" class="btn btn-success btn-xm">Terupload</a>
						<a href="<?= base_url("tugas/hapustugasakhir/".$this->session->id)?>" class="btn btn-danger btn-xm">Hapus</a>
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
