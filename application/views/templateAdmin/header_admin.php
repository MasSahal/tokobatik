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
  <link href="<?php echo base_url('');?>assets/img/skripsi.png" rel="icon">
  <link href="<?php echo base_url('');?>assets/img/skripsi1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('');?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('');?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url('');?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url('');?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url('');?>assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="<?php echo base_url('');?>assets/css/variables.css" rel="stylesheet">
  <link href="<?php echo base_url('');?>assets/css/main.css" rel="stylesheet">
  <style type="text/css">
    
      .scrollme {
          overflow-x: auto;
      }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?php echo base_url('admin');?>" class="logo d-flex align-items-center">
        <h1>Batik Wong Trusmi</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a href="<?php echo base_url('admin');?>">Dashboard</a></li>
          <li><a href="<?php echo base_url('produk');?>">Produk</a></li>
          <li><a href="<?php echo base_url('gambar_produk');?>">Gambar Produk</a></li>
          <li><a href="<?php echo base_url('kategori');?>">Kategori</a></li>
          <li><a href="<?php echo base_url('pesanan_admin');?>">Pesanan</a></li>
          <li><a href="<?php echo base_url('laporan');?>">Laporan</a></li>
          <li><a href="<?php echo base_url('testimoni');?>">Testimoni</a></li>
          <li><a href="<?php echo base_url('saran');?>">Saran</a></li>
          <!-- Proflie header -->
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('nama')  ?></span>
            </a><!-- End Profile Iamge Icon -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?= $this->session->userdata('nama')  ?></h6>
              </li>
              <li>
                <hr class="dropdown-divider">
              <li>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/login/logout') ?>">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Log Out</span>
                </a>
              </li>
            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->
        </ul>
      </nav><!-- .navbar -->
      </div>

    </div>

  </header><!-- End Header -->
