
  <div class="section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="mb-4 section-title">Anggota Komunitas</h2>
          <br>
          </div>
        </div>
        <div class="row">
        <?php  foreach ($galeri as $g) { ?>
        
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="media d-block media-custom text-center">

          <div class="card" style="width: 18rem;">
            <a target="_blank" href="<?php echo base_url('img/') . $g->Foto  ?>">
            <img src="<?php echo base_url('img/') . $g->Foto  ?>" class="card-img-top img-fluid" alt="Image Placeholder">
            <div class="card-body">
              <h5 class="card-title"><?php echo $g->Nama_foto ?></h5>
              <p class="card-text"><?= $g->Deskripsi_foto; ?> <br> Bahasa : <?= $g->Bahasa; ?></p>
              <p class="card-text"></p>
              <a href="<?= $g->Portofolio; ?>" class="btn btn-primary">Github</a>
              <a href="<?= $g->linkedin; ?>" class="btn btn-primary">Linkedin</a>
              <hr>
              <a href="#" class="btn btn-primary">Unduh CV</a>
            </div>
          </div>
          </div>
        </div>
        <?php } ?>
        </div>
    </div>
  </div>
<!-- END CONTENT -->
