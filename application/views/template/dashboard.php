<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $menu ?></title>
	<!-- Ikon -->
	<link rel="shortcut icon" href="<?= base_url() ?>/assets/dist/img/favicon.png">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme stye -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Aous -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/aos/aos.css">
	<?php
	if ($this->uri->segment(1) == "siswa") {
		$this->load->view("script/datatables-header");
	} elseif ($this->uri->segment(1) == "user" and $this->uri->segment(2) == null) {
		$this->load->view("script/datatables-header");
	} elseif ($this->uri->segment(1) == "bimbingan" or $this->uri->segment(1) == "tugas") {
		$this->load->view("script/datatables-header");
	} elseif ($this->uri->segment(1) == "info" and $this->uri->segment(2) == "edit" or $this->uri->segment(1) == "info" and $this->uri->segment(2) == "tambah") {
		$this->load->view("script/summernote-header");
	} elseif ($this->uri->segment(1) == "modul" and $this->uri->segment(2) == "edit" or $this->uri->segment(1) == "modul" and $this->uri->segment(2) == "tambah") {
		$this->load->view("script/summernote-header");
	}
	?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-green navbar-dark">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item d-none d-sm-inline-block ">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url() ?>" class="nav-link">Hari ini : <?= date('d - m - Y'); ?></a>
				</li>
				<li class="nav-item d-lg-none">
					<div class="image">
						<a href="#"><img src="<?= base_url() ?>/assets/dist/img/logo-lembaga.png" style="width: 180px; height: 50px;" alt="User Image"></a>
					</div>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('auth/logout') ?>"><i class="fas fa-user"></i> Hi <?= $this->session->userdata("username")?>!</a>
					<!-- <a class="nav-link" href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i></a> -->
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<?= $contents ?>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer text-center bg-success d-lg-none">
			<div class="row text-white">
				<?php if($this->uri->segment(3) != null) {?>
					<div class="col"><a class="text-white" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Kembali</a></div>
				<?php } ?>
				<?php if($this->uri->segment(3) != null) { } else {?>
					<div class="col"><a class="text-white" href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Beranda</a></div>
					<div class="col"><a class="text-white" href="<?= base_url('page/menu/awal') ?>"><i class="fas fa-list"></i> Menu</a></div>
				<?php } ?>
			</div>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- Select2 -->
	<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>/assets/dist/js/adminlte.js"></script>

	<!-- OPTIONAL SCRIPTS -->
	<script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>
	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="<?= base_url() ?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/raphael/raphael.min.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

	<!-- PAGE SCRIPTS -->
	<script src="<?= base_url() ?>/assets/dist/js/pages/dashboard2.js"></script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4',
			})
		})
	</script>

	<?php
	if ($this->uri->segment(1) == "profil" and $this->uri->segment(2) == "edit") {
		$this->load->view("script/profil_edit");
	} elseif ($this->uri->segment(1) == "info" and $this->uri->segment(2) == "edit" or $this->uri->segment(1) == "info" and $this->uri->segment(2) == "tambah") {
		$this->load->view("script/summernote-footer");
	} elseif ($this->uri->segment(1) == "siswa") {
		$this->load->view("script/datatables-footer");
		$this->load->view("script/datatables-anggota");
	} elseif ($this->uri->segment(1) == "bimbingan" or $this->uri->segment(1) == "tugas") {
		$this->load->view("script/datatables-footer");
		$this->load->view("script/datatables-anggota");
	}
	
	?>

</body>

</html>
