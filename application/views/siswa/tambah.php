<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="col-12">
				<div class="card-header">
					<a href="<?= base_url('siswa'); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
				</div>
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title"><?= $menu ?></h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="" method="post">
						<div class="card-body">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" placeholder="fitrah" required="" value="<?= set_value('username'); ?>">
								<?php echo form_error('username') ?>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="Fitrah Izul Falaq" required="" value="<?= set_value('nama'); ?>">
								<?php echo form_error('nama') ?>
							</div>														
							<div class="form-check">
								<input type="checkbox" class="form-check-input" required>
								<label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-success">Tambah</button>
							<button type="reset" class="btn btn-danger">Ulangi</button>
						</div>
					</form>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>
