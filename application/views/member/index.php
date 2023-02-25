
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  <!-- THEME STYLE -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header role="banner">
    <nav class="navbar navbar-expand-lg  bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('auth/index'); ?>">K P M</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
          aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample05">
          <ul class="navbar-nav pl-md-5 ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('auth/index'); ?>">Beranda</a>
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
                <a href="<?= base_url('auth/activity'); ?>" class="dropdown-item">Foto Kegiatan</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('auth/news'); ?>">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/contact'); ?>">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('member/login'); ?>">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('member/login'); ?>">Forum Diskusi</a>
            </li>
          </ul>
          <div class="navbar-nav ml-auto">
            <form method="post" class="search-form" action="<?= base_url('auth/gallery'); ?>">
              <span class="icon ion ion-search"></span>
              <input type="text" class="form-control" placeholder="Cari..." required>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- END HEADER -->

  <div class="slider-item overlay" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center">
        <div class="col-lg-12 text-center col-sm-12">
          <p data-aos="fade-up" data-aos="fade-up" data-aos-delay="">Profil komunitas Programmer isinya apa? <a href="https://www.dicoding.com/blog/apa-itu-programmer-hal-yang-wajib-dikuasai/" target="_blank">Lihat Selengkapnya</a></p>
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">Kami membuat hal yang luar biasa.</h1>
          <div class="btn-play-wrap mx-auto" data-aos="fade-up" data-aos-delay="200">
            <a href="https://youtu.be/BBlJ0dyCeBA" data-fancybox data-ratio="2" class="btn-play"><span class="ion ion-ios-play"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section portfolio-section">
    <div class="container">
      <div class="row mb-5 justify-content-center" data-aos="fade-up">
        <div class="col-md-8 text-center">
          <h2 class="mb-4 section-title">Gallery Kegiatan Komunitas Programmer Millenial</h2>
          <p> kumpulan atau koleksi foto dan video yang menampilkan kegiatan atau acara yang telah dilakukan oleh komunitas spyderbit.</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row mb-5 no-gutters">
        <div class="col-sm-6 col-md-6 col-lg-6" data-aos="fade" data-aos-delay="100">
          <div class="work-thumb">
            <div class="work-text">
              <h2>Kumpul Bareng Komunitas</h2>
              <p>Sokaraja</p>
            </div>
            <img src="<?php echo base_url('assets/frontend/') ?>images/gallery_1.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6" data-aos="fade" data-aos-delay="200">
          <div class="work-thumb">
            <div class="work-text">
              <h2>Kumpul Bareng Komunitas</h2>
              <p>Sokaraja</p>
            </div>
            <img src="<?php echo base_url('assets/frontend/') ?>images/gallery_2.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <p><a href="<?php echo base_url('auth/all_gallery')?>" class="btn btn-outline-white px-4 py-3">Lihat Lainnya</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 ml-auto mb-5 order-2">
        <span class="d-block text-uppercase text-primary" data-aos="fade-up">Siapa Kita</span>
          <h2 class="mb-4 section-title animated slideInLeft">Lakukan Hal-Hal yang Penting. Rencana. Membuat. Tumbuh.</h2>
        <p data-aos="fade-up">Komunitas Programmer merupakan sebuah komunitas koding di daerah Banyumas. Yang menyediakan forum untuk web developer dan programmer lainnya. Disamping itu komunitas programmer juga untuk diskusi seputar web development, programming, design, ataupun seputar IT lainnya.</p>
        <p><a href="<?php echo base_url("auth/profile") ?>" class="btn btn-outline-black" data-aos="fade-right">Kenali Lebih Lanjut</a></p>
        </div>
        <div class="col-lg-6 order-1">
          <figure class="img-dotted-bg">
          <img src="<?php echo base_url('assets/frontend/') ?>images/profile_1.jpg" alt="Image" class="img-fluid" data-aos="fade-left">
          </figure>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-4">
          <div class="service" data-aos="fade-up" data-aos-delay="">
            <span class="icon icon-fire mb-4 d-block"></span>
            <h3>Pelatihan</h3>
            <p>Pelatihan kepada anggota untuk meningkatkan keterampilan dalam pemrograman sehingga dapat membuka peluang untuk karir di indsutri teknologi yang berkembang pesat</p>
          </div>
        </div>
        <div class="col-lg-3 mb-4">
          <div class="service" data-aos="fade-up" data-aos-delay="100">
            <span class="icon icon-screen-desktop mb-4 d-block"></span>
            <h3>Pembuatan Web</h3>
            <p>Membuatkan website profesional dan responsif yang sesuai dengan kebutuhan bisnis atau personal.</p>
          </div>
        </div>
        <div class="col-lg-3 mb-4">
          <div class="service" data-aos="fade-up" data-aos-delay="200">
            <span class="icon icon-screen-smartphone mb-4 d-block"></span>
            <h3>Pembuatan Software / Aplikasi</h3>
            <p>Jasa pembuatan aplikasi atau software dapat membantu memenuhi kebutuhan bisnis atau personal dengan mengembangkan solusi digital yang inovatif dan efektif.</p>
          </div>
        </div>
        <div class="col-lg-3 mb-4">
          <div class="service" data-aos="fade-up" data-aos-delay="300">
            <span class="icon icon-mouse mb-4 d-block"></span>
            <h3>Desain </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias id volume amet.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section f block-11">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
          <h2 class="mb-4 section-title" data-aos="fade-up">Testimonial</h2>
        </div>
      </div>
      <div class="nonloop-block-11 owl-carousel">
        <div class="item">
          <div class="block-33 h-100">
            <div class="vcard d-flex mb-3">
              <div class="image align-self-center"><img src="<?php echo base_url('assets/frontend/') ?>images/testimonial_1.jpg" alt="Person here"></div>
              <div class="name-text align-self-center">
                <h2 class="heading">Rani Kusmiati</h2>
                <span class="meta">Customer Corp.</span>
              </div>
            </div>
            <div class="text">
              <blockquote>
                <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat qui, ipsum debitis id
                  reprehenderit ut soluta possimus consectetur asperiores totam veniam quasi molestiae. Animi doloribus
                  accusamus eius ex laudantium vitae? &ldquo;</p>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="block-33 h-100">
            <div class="vcard d-flex mb-3">
              <div class="image align-self-center"><img src="<?php echo base_url('assets/frontend/') ?>images/testimonial_2.jpg" alt="Person here"></div>
              <div class="name-text align-self-center">
                <h2 class="heading">Budi Anduk</h2>
                <span class="meta">Customer Corp.</span>
              </div>
            </div>
            <div class="text">
              <blockquote>
                <p>&rdquo; Lorem, ipsum dolor sit amet consectetur adipisicing elit. At, ut enim error molestias maxime
                  deserunt voluptate doloribus nihil nesciunt id perferendis, doloremque earum architecto ab incidunt
                  sunt
                  corrupti. Consequuntur qui ullam voluptates sapiente quod esse eum. &ldquo;</p>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="block-33 h-100">
            <div class="vcard d-flex mb-3">
              <div class="image align-self-center"><img src="<?php echo base_url('assets/frontend/') ?>images/testimonial_3.jpg" alt="Person here"></div>
              <div class="name-text align-self-center">
                <h2 class="heading">Joni Jontor</h2>
                <span class="meta">Customer Corp.</span>
              </div>
            </div>
            <div class="text">
              <blockquote>
                <p>&rdquo; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ab? Asperiores dolore
                  blanditiis quis sapiente soluta aliquid officiis. &ldquo;</p>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="block-33 h-100">
            <div class="vcard d-flex mb-3">
              <div class="image align-self-center"><img src="<?php echo base_url('assets/frontend/') ?>images/testimonial_4.jpg" alt="Person here"></div>
              <div class="name-text align-self-center">
                <h2 class="heading">Vanesa Agustina</h2>
                <span class="meta">Customer Corp.</span>
              </div>
            </div>
            <div class="text">
              <blockquote>
                <p>&rdquo; Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, accusamus? Porro fugit culpa
                  consequuntur dolorum. &ldquo;</p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-primary py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <h3 class="text-white mb-2 font-weight-normal" data-aos="fade-right" data-aos-delay="">Mari berbuat lebih banyak bersama-sama kami</h3>
          <p class="mb-0" data-aos="fade-right" data-aos-delay="200"><a href="<?= base_url("member/login"); ?>" class="btn btn-outline-white px-4 py-3">Gabung Sekarang</a></p>
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