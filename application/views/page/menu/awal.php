<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<center><h2>Menu Pembelajaran</h2></center>
						<hr>
						<a href="<?=base_url("page/menu/1_ruang_materi")?>" class="btn btn-primary btn-block text-left"><i class="fa fa-book"></i> RUANG MATERI</a>
						<a href="<?=base_url("page/menu/2_ruang_referensi")?>" class="btn btn-primary btn-block text-left"><i class="fa fa-list"></i> REFERENSI / ​SUMBER BELAJAR</a>
						<a href="<?=base_url("page/menu/3_evaluasi")?>" class="btn btn-primary btn-block text-left"><i class="fa fa-check"></i> RUANG EVALUASI</a>
						<a href="<?=base_url("bimbingan")?>" class="btn btn-primary btn-block text-left"><i class="fa fa-comments"></i> RUANG DISKUSI</a>
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
