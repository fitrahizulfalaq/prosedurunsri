<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php $this->view('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-info card-outline">
					<div class="card-body box-profile">
						<table class="table table-bordered table-striped" id="example1">
							<thead>
								<tr>
									<th>Nama</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($row->result() as $key => $data) {;
								?>
									<tr>
										<td scope="row">
											<small><?= $data->username ?></small><br>
											<a href="<?= base_url('bimbingan/mentor/2/siswa/' . $data->id); ?>">
												<?= $data->nama ?>
											</a>
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
