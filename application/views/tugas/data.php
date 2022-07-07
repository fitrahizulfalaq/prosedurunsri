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
											<p><?= $data->nama ?></p>
											<?php if ($this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("draft") != null ) { ?>
												<a href="<?=base_url("/asset/dist/img/filetugas/".$this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("draft"))?>" class="btn btn-xs btn-info">Draft</a>
											<?php } ?>
											<?php if ($this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("revisi") != null ) { ?>
												<a href="<?=base_url("/asset/dist/img/filetugas/".$this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("revisi"))?>?>" class="btn btn-xs btn-secondary">Revisi</a>
											<?php } ?>
											<?php if ($this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("teks") != null ) { ?>
												<a href="<?=base_url("/asset/dist/img/filetugas/".$this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("teks"))?>" class="btn btn-xs btn-warning">Teks</a>
											<?php } ?>
											<?php if ($this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("tugasakhir") != null ) { ?>
												<a href="<?=base_url("/asset/dist/img/filetugas/".$this->fungsi->pilihan_advanced("tb_tugas","user_id",$data->id)->row("tugasakhir"))?>" class="btn btn-xs btn-success">Tugas Akhir</a>
											<?php } ?>
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
