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
        <h2 class="mb-4 section-title">Dokumentasi Kegiatan</h2>
        <br>
      </div>
    </div>
    <div class="row">
      <?php foreach ($kegiatan as $g) { ?>
        <?php if ($g->jenis_kegiatan == 'kelompok') { ?>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="media d-block media-custom text-center">
              <a target="_blank" href="<?php echo base_url('img/') . $g->logo_kegiatan ?>">
                <img src="<?php echo base_url('img/') . $g->logo_kegiatan ?>" alt="Image Placeholder" class="img-fluid"></a>
              <div class="media-body">
                <h3 class="mt-0 text-black"><?php echo $g->nama_kegiatan ?></h3>
                <p><?= $g->isi_kegiatan; ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
  <!-- END CONTENT -->
</div>
