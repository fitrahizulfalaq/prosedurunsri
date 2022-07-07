<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="card card-primary card-outline">
				<div class="card-body p-0">
					<div class="mailbox-read-info">
						<h2><?= $data->judul ?></h2>
						<span class="mailbox-read-time">
							<i class="fas fa-user"></i>
							<?= $this->fungsi->pilihan_selected("tb_user", $data->user_id)->row("nama") ?>
						</span>
						<span class="mailbox-read-time float-right">
							<?= $data->created ?>
						</span>
						</p>
					</div>

					<div class="mailbox-controls with-border text-center">
						<img class="img-fluid" src="<?= base_url() ?>assets/dist/img/foto-info/<?= ($data->foto != null) ? $data->foto : "foto-default.png"; ?>" alt="User profile picture" style="width: 400px;">
					</div>

					<div class="mailbox-read-message">
						<p>
							<?= $data->deskripsi ?>
						</p>
					</div>
					<?php if ($data->file != "") { ?>
						<div class="mailbox-controls with-border text-center">
							<a href="<?= base_url("assets/dist/img/file-info/" . $data->file) ?>" class="btn btn-sm btn-success">Download Lampiran Informasi</a>
						</div>
					<?php } ?>

				</div>
				<!-- /.card-footer -->
				<div class="card-footer">
					<div class="float-right">
						<a class="btn btn-primary btn-sm" href="javascript:window.history.back()"><i class="fas fa-reply"></i> Kembali</a>
					</div>

					<?php if ($this->fungsi->user_login()->tipe_user < 2) {
					} else {; ?>
						<a href="<?= site_url('info/hapus/' . $data->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin mau dihapus?')"><i class="far fa-trash-alt"></i> Hapus</a>
						<a href="<?= site_url('info/edit/' . $data->id); ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Edit</a>
					<?php } ?>


				</div>
				<!-- /.card-footer -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
