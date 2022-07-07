<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message') ?>
		<h3>Selamat datang <br> <?= $this->session->userdata("nama")?></h3>
		<div class="row">
			<!-- Menu-->
			<div class="col-lg-2 col-6">
				<!-- small card -->
				<div class="small-box bg-white">
					<div class="inner text-center">
						<a href="<?= base_url('page/petunjuk') ?>">
							<img src="<?= base_url("") ?>/assets/dist/img/petunjuk.png" alt="" width="100%">
						</a>
					</div>
					<a href="<?= base_url('page/petunjuk') ?>" class="small-box-footer">
						Petunjuk
					</a>
				</div>
			</div>
			<!-- Menu-->
			<div class="col-lg-2 col-6">
				<!-- small card -->
				<div class="small-box bg-white">
					<div class="inner text-center">
						<a href="<?= base_url('info') ?>">
							<img src="<?= base_url("") ?>/assets/dist/img/tentang.png" alt="" width="100%">
						</a>
					</div>
					<a href="<?= base_url('info') ?>" class="small-box-footer">
						Info Terbaru
					</a>
				</div>
			</div>
			<!-- Menu-->
			<div class="col-lg-2 col-6">
				<!-- small card -->
				<div class="small-box bg-white">
					<div class="inner text-center">
						<a href="<?= base_url('page/profil_pembimbing') ?>">
							<img src="<?= base_url("") ?>/assets/dist/img/profil.png" alt="" width="100%">
						</a>
					</div>
					<a href="<?= base_url('page/profil_pembimbing') ?>" class="small-box-footer">
						Profil Pembimbing
					</a>
				</div>
			</div>
			<!-- Menu-->
			<div class="col-lg-2 col-6">
				<!-- small card -->
				<div class="small-box bg-white">
					<div class="inner text-center">
						<a href="<?= base_url('page/profil_peneliti') ?>">
							<img src="<?= base_url("") ?>/assets/dist/img/profil.png" alt="" width="100%">
						</a>
					</div>
					<a href="<?= base_url('page/profil_peneliti') ?>" class="small-box-footer">
						Profil Peneliti
					</a>
				</div>
			</div>
			<?php if ($this->session->tipe_user == "2") { ?>
				<!-- Menu-->
				<div class="col-lg-2 col-6">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('siswa') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/kelompok.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('siswa') ?>" class="small-box-footer">
							Pengguna
						</a>
					</div>
				</div>
				<!-- Menu-->
				<div class="col-lg-2 col-6">
					<!-- small card -->
					<div class="small-box bg-white">
						<div class="inner text-center">
							<a href="<?= base_url('tugas') ?>">
								<img src="<?= base_url("") ?>/assets/dist/img/evaluasi.png" alt="" width="100%">
							</a>
						</div>
						<a href="<?= base_url('tugas') ?>" class="small-box-footer">
							Tugas
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
		<!-- /.row -->
	</div>
</section>
<!-- /.content
