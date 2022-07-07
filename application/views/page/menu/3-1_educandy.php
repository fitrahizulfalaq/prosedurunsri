<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<h1>Quiz Educandy</h1>
						<img src="<?= base_url()?>/assets/dist/img/educandy.png" alt="" width="100%">
						<hr>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Mulai Quiz</button>
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
				<h4 class="modal-title">Quiz Educandy</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe src="https://www.educandy.com/site/resource.php?activity-code=1054b2" frameborder="0" width="100%" height="700px"></iframe>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
