
  <div class="bg-secondary py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-7">
        </div>
      </div>
    </div>
  </div>
<!-- END NAVBAR -->

  <div class="section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="mb-4 section-title">Anggota Komunitas Kami</h2>
          <br>
          </div>
        </div>
        <?php foreach ($galeri as $g) { ?>
        <div class="row">
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="media d-block media-custom text-center">
            <a target="_blank" href="<?php echo base_url('img/') . $g->Foto  ?>">
            <img src="<?php echo base_url('img/') . $g->Foto ?>"alt="Image Placeholder" class="img-fluid"></a>
            <div class="media-body">
              <h3 class="mt-0 text-black"><?php echo $g->Nama_foto ?></h3>
              <p><?= $g->Deskripsi_foto; ?></p>
            </div>
          </div>
        </div>
        <?php } ?>
    <div class="bg-white py-5">
      <div class="container">
          <div class="col-lg-7">
            <p class="mb-5" data-aos="fade-right" data-aos-delay="200"><a href="<?= base_url('auth/all_gallery'); ?>" class="btn btn-outline-black px-4 py-3">Tampilkan Lebih Banyak</a></p>
          </div>
        </div>
      </div>
    </div>
<!-- END CONTENT -->
