<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Batik Wong Trusmi</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/2015f4b5f6.js" crossorigin="anonymous"></script>

	<!-- Favicons -->
	<link href="<?php echo base_url(''); ?>assets/img/skripsi.png" rel="icon">
	<link href="<?php echo base_url(''); ?>assets/img/skripsi1.png" rel="apple-touch-icon">


	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo LINK_MIDTRANS_JS ?>" data-client-key="<?php echo MIDTRANS_CLIENT_KEY; ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Template Main CSS Files -->
	<link href="<?php echo base_url(''); ?>assets/css/variables.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(''); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Midtrans -->
	<style type="text/css">
		.badge {
			position: absolute;
			margin-left: -5px;
			margin-top: -10px;
			background-color: #000;
			color: white;
		}

		.scrollme {
			overflow-x: auto;
		}
	</style>
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header d-flex align-items-center fixed-top">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
			<?php ?>
			<a class="logo-header" href="<?= base_url('') ?>">
				<img src="<?= base_url() ?>assets/img/skripsitransaparan.png" alt="" class="img-fluid img-circle elevation-3" style="border-radius:500px; width:150px; height:150px">
				<span class="">Batike Wong Trusmi</span>
			</a>
			<?php ?>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a href="<?php echo base_url('landing'); ?>">Blog</a></li>
					<li class="dropdown"><a href="<?php echo base_url('buyer/produk'); ?>"><span>Produk</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
						<ul>
							<?php foreach ($kategori as $no => $r) { ?>
								<li><a href="<?= $r->link; ?>"><?= $r->nama_kategori; ?></a></li>
							<?php } ?>
						</ul>
					</li>
					<li><a href="<?php echo base_url('Landing'); ?>">About</a></li>
					<li><a href="<?php echo base_url('buyer/testimoni/tampilTestimoni'); ?>">Testimoni</a></li>
					<li class="nav-item">
						<?php if ($this->session->userdata('email') == "") { ?>
							<a class="nav-link" href="<?= base_url('auth/login/login') ?>">
								<span class="brand-text font-weight-light">Login/Register</span>
								<img src="<?= base_url() ?>assets/img/foto/profile.png" alt="" class="img-fluid img-circle elevation-3" style="border-radius:500px; width:40px; height:40">
							</a>
						<?php } else { ?>
							<a class="nav-link" data-bs-toggle="dropdown" href="#">
								<span class="brand-text font-weight-light"><?= $this->session->userdata('nama')  ?></span>
								<img src="<?= base_url('assets/img/foto/' . $this->session->userdata('foto')) ?>" alt="" class="brand-image img-circle elevation-3" style="border-radius:500px; width:40px; height:40">
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
								<a href="<?= base_url('auth/login/akun') ?>" class="dropdown-item d-flex align-items-center">
									<i class="fas fa-user"></i>Akun Saya
								</a>
								<div class="dropdown-divider"></div>
								<a href="<?= base_url('pesanan') ?>" class="dropdown-item d-flex align-items-center">
									<i class="fas fa-shopping-cart"></i>Pesanan Saya
								</a>
								<div class="dropdown-divider"></div>
								<a href="<?= base_url('auth/login/logout')  ?>" class="dropdown-item dropdown-footer">Log Out</a>
							</div>
						<?php } ?>
					</li>
					<?php if (empty($this->cart->contents())) {
					?>
						<a href="<?php echo base_url('keranjang'); ?>" class="mx-2"><i class="bi-cart3"></i></a>
					<?php
					} else {
					?>
						<a href="<?php echo base_url('keranjang'); ?>" class="mx-2"><i class="bi-cart3"><span class='badge badge-pill'><?= count($this->cart->contents()); ?></span></i></a>
					<?php
					} ?>

				</ul>
			</nav><!-- .navbar -->
		</div>
		</div>
	</header><!-- End Header -->
