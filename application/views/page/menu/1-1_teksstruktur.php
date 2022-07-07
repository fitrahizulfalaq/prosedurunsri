<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<center>
							<h4>TEKS PROSEDUR & STRUKTUR TEKS PROSEDUR</h4>
						</center>
						<hr>
						<iframe frameBorder="0" width="100%" height="300" src="https://www.youtube-nocookie.com/embed/LTpNJv-a1TM?mute=0&modestbranding=0&autoplay=1&autohide=1&rel=0&showinfo=0&controls=0&disablekb=1&enablejsapi=1&iv_load_policy=3&loop=1&playsinline=1&fs=0"></iframe>
						<br>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Baca Materi</button>
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-ppt">Baca PPT</button>

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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Materi Prosedur Teks</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe src="https://drive.google.com/file/d/15gtN38TJAQTZtafvN45af9LgKtEaZooI/preview" frameborder="0" width="100%" height="700px"></iframe>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-ppt">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">PPT</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe src="https://drive.google.com/file/d/14J-WAVCjITH8rz5cr-xAOi4E3xihbg55/preview" frameborder="0" width="100%" height="700px"></iframe>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
