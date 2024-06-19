
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $title;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="<?php echo base_url('vendor/frontend/kpm/logo/') ?>Untitled-001.png">

  <link href="<?php echo base_url('assets/frontend/') ?>https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|Roboto+Mono&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/aos.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/') ?>css/style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid ">
        <a class="navbar-brand " href="<?= base_url('auth/index'); ?>">SpyderBIT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
          aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample05">
          <ul class="navbar-nav pl-md-5 ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/index'); ?>">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (uri_string() == 'auth/profile') echo "active" ?>" href="<?= base_url('auth/profile'); ?>">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (uri_string() == 'auth/gallery') echo "active" ?>" href="<?= base_url('auth/gallery'); ?>">Talent</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(uri_string() == 'auth/activity') echo "active" ?> " href="<?= base_url('auth/activity'); ?>">Kegiatan Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(uri_string() == 'auth/news') echo "active" ?> " href="<?= base_url('auth/news'); ?>">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(uri_string() == 'auth/contact') echo "active" ?>" href="<?= base_url('auth/contact'); ?>">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- END HEADER -->