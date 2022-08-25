<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Batik Wong Cirebon</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?= base_url() ?>assets/frontend/img/favicon.png" rel="icon">
	<link href="<?= base_url() ?>assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= base_url() ?>assets/frontend/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/frontend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>

	<?php include('header.php'); ?>

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
			<h1>Your New Online Presence with Bethany</h1>
			<h2>We are team of talented designers making websites with Bootstrap</h2>
			<a href="#about" class="btn-get-started scrollto">Get Started</a>
		</div>
	</section><!-- End Hero -->

	<main id="main">
		<?= $contents; ?>

	</main><!-- End #main -->

	<?php include('footer.php'); ?>

</body>

</html>