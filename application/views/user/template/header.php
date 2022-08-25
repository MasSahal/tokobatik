<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
	<div class="container">
		<div class="header-container d-flex align-items-center justify-content-between">
			<div class="logo">
				<a href="index.html" class="font-weight-bold"><img src="<?= base_url() ?>assets/img/skripsitransaparan.png" alt="" class="img-fluid"> <b>Batike Wong Trusmi</b></a>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="#about">About</a></li>
					<li><a class="nav-link scrollto" href="#services">Services</a></li>
					<li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
					<li><a class="nav-link scrollto" href="#team">Team</a></li>
					<li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
						<ul>
							<?php foreach ($kategori as $r) { ?>
								<li><a href="<?= $r->link; ?>"><?= $r->nama_kategori; ?></a></li>
							<?php }; ?>
						</ul>
					</li>
					<li><a class="nav-link scrollto" href="#contact">Contact</a></li>
					<li><a class="getstarted scrollto text-center" href="#about">Keranjang</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div><!-- End Header Container -->
	</div>
</header><!-- End Header -->
