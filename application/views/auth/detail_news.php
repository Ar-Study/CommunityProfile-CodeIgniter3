<div class="bg-secondary py-5">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-7">
            </div>
        </div>
    </div>
</div>
<?php foreach($berita as $b): ?>
<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 ml-auto mb-5 order-2">
        <img src="<?php echo base_url() . './img/' . $b->Foto_berita; ?>" alt="Image" class="img-fluid " data-aos="fade-left">
        <span class="d-block text-primary" data-aos="fade-up">Created at <?= $b->Tanggal_berita; ?></span>
          <h2 class="mb-4 section-title animated slideInLeft"><?= $b->Judul_berita; ?></h2>
        <p data-aos="fade-up"><?= $b->Deskripsi_berita;?></p>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>