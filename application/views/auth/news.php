
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|Roboto+Mono&display=swap" rel="stylesheet"/>
		<link rel="stylesheet" href="css/animate.css" />
		<link rel="stylesheet" href="css/owl.carousel.min.css" />
		<link rel="stylesheet" href="css/jquery.fancybox.min.css" />
		<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css" />
		<link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
		<link rel="stylesheet" href="css/aos.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"/>

		<!-- THEME STYLE -->
		<link rel="stylesheet" href="css/style.css" />
	</head>

	<body>
    <header role="banner">
			<nav class="navbar navbar-expand-lg bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?= base_url('auth/index'); ?>">K P M</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarsExample05">
						<ul class="navbar-nav pl-md-5 ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('auth/index'); ?>">Beranda</a>
							</li>
							<li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                  <div class="dropdown-menu">
                      <a href="<?= base_url('auth/profile'); ?>" class="dropdown-item">Pengertian Profil Komunitas</a>
                      <a href="<?= base_url('auth/profile_management'); ?>" class="dropdown-item">Dewan Kepengurusan</a>
                  </div>
                </li>
              <li class="nav-item">
								<a class="nav-link" href="<?= base_url('auth/gallery'); ?>">Galeri</a>
							</li>
							<li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kegiatan Kami</a>
                  <div class="dropdown-menu">
                    <a href="<?= base_url('auth/activity'); ?>" class="dropdown-item">Jenis Kegiatan</a>
                  </div>
                </li>
							<li class="nav-item">
								<a class="nav-link active" href="<?= base_url('auth/news'); ?>">Berita</a>
							</li>
              <li class="nav-item">
								<a class="nav-link" href="<?= base_url('auth/contact'); ?>">Kontak</a>
							</li>
                </ul>
                  <div class="navbar-nav ml-auto">
                    <form method="post" class="search-form">
                      <span class="icon ion ion-search"></span>
                        <input type="text" class="form-control" placeholder="Cari..." required>
                    </form>
                </div>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- END HEADER -->

		<div class="bg-secondary py-5">
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col-lg-7">
        </div>
    </div>
    </div>
</div>
<!-- END NAVBAR -->

		<div class="section" style="background-color: #CFD2CF;">
			<div class="container p-5 bg-light rounded" style="border: 1px solid #A2B5BB;">
				<div class="row mb-5">
					<div class="col-12 mb-5 order-2">
					<h5 style="background-color: LightGray;" class="font-weight-normal text-center animated slideInDown">Berita seputar dunia teknologi dan programming</h5>
            <br>
							<div class="row">
							<div class="col-md-6 form-group">
            <div>
            <img src="<?php echo base_url('assets/frontend/') ?>images/berita_1.jpg" alt="Image" class="img-fluid img-absolute" data-aos="fade-left">
						<div class="service">
            <a href="contact.html">
							<h3>Tampilan Samsung Galaxy Watch4 yang hadir di pasar Indonesia. Kredit: Samsung Electronics Indonesia Studi Klaim Sensor Samsung Galaxy Watch4 Sangat Mirip dengan Alat Medis</h3>
							<p style="color:Gray;">Para peneliti menemukan bahwa sensor Galaxy Watch4 sedikit lebih andal daripada instrumen medis standar yang dikenakan di pergelangan tangan.</p>
						</div>
					</div>
					<br>
            <img src="<?php echo base_url('assets/frontend/') ?>images/berita_2.jpg" alt="Image" class="img-fluid img-absolute" data-aos="fade-left">
					<div class="service"><a href="contact.html">
						<h3>Teknologi Antivirus New Queen Series SHARP Bikin Adem di Hati</h3>
							<p style="color: gray;">Teknologi Plasmacluster telah diriset dan diuji coba SHARP lebih dari 20 tahun yang lalu, dan pada tahun 2020 telah dilakukan penelitian yang membuktikan.</p>
						</div>
						<br>
              <img src="<?php echo base_url('assets/frontend/') ?>images/berita_3.jpg" alt="Image" class="img-fluid img-absolute" data-aos="fade-left">
						<div class="service"><a href="contact.html">
						<h3>Strategi Lenovo Hadapi Persaingan Panas Bisnis Laptop</h3>
							<p style="color: gray;">Jakarta - Lenovo adalah pemain lama di bisnis laptop, namun belakangan persaingan di bisnis tersebut semakin ketat karena munculnya banyak pemain baru. Lalu bagaimana strategi Lenovo dalam menghadapi persaingan tersebut?</p>
						</div>
						<br>
						<nav aria-label="...">
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link">Page</a>
                </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item" aria-current="page">
                      <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
	      </ul>
      </nav>	
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<!-- END CONTENT -->

  <footer class="site-footer" role="contentinfo">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4 mb-5">
          <h3 class="mb-4">Tentang Kami</h3>
          <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias nihil numquam aspernatur
            inventore sint eligendi nostrum!</p>
          <ul class="list-unstyled footer-link d-flex footer-social">
            <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
            <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
            <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
            <li><a href="#" class="p-2"><span class="fa fa-telegram"></span></a></li>
          </ul>
        </div>
        <div class="col-md-5 mb-5 pl-md-5">
          <div class="mb-5">
            <h3 class="mb-4">Info Kontak</h3>
            <ul class="list-unstyled footer-link quick-contact">
              <li class="d-block">
                <span class="d-block caption">Alamat:</span>
                <span class="caption-text">Jl. Karen Indah I, Dusun III Karangdur, Karangduren, Kec. Sokaraja, Kabupaten Banyumas, Jawa Tengah 53181</span>
              </li>
              <li class="d-block">
                <span class="d-block caption">Telepon:</span><span class="caption-text">+62 242 4942 290</span>
              </li>
              <li class="d-block">
                <span class="d-block caption">Email:</span><span class="caption-text">komunitasprogrammer@gmail.com</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 mb-5">
          <h3 class="mb-4">Layanan Kami</h3>
          <ul class="list-unstyled footer-link">
            <li><a href="#">Pelatihan</a></li>
            <li><a href="#">Pembuatan Desain Website</a></li>
            <li><a href="#">Pembuatan Website</a></li>
            <li><a href="#">Pengembangan Website</a></li>
          </ul>
        </div>
        </div>
      </div>
      <div class="col-md-2 mb-5 ml-auto">
        <a href="https://wa.me/088232106692" class="btn btn-success px-4 py-3" target="_blank"><span class="fa fa-whatsapp"> Chat</a>
        </div>
      <div class="row">
        <div class="col-12 text-md-center text-left">
          <p class="copyright"><small>&copy;
            <script>document.write(new Date().getFullYear());</script> Komunitas Programmer Millenial. All Rights Reserved.</small>
          </p>
      </div>
    </div>
  </footer>
  <!-- END FOOTER -->

  <div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ffc107" />
    </svg>
  </div>
  <!-- END LOADER -->

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
</body>

</html>