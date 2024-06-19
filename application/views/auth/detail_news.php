
<?php foreach($berita as $b): ?>
<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 ml-auto mb-5 order-2">
        <h2 class="mb-4 section-title animated slideInLeft"><?= $b->Judul_berita; ?></h2>
        <span class="d-block text-primary" data-aos="fade-up">Posted at <?= date("F d, Y",strtotime($b->Tanggal_berita) );  ?></span>
        <img src="<?php echo base_url() . './img/' . $b->Foto_berita; ?>" alt="Image" class="img-fluid " data-aos="fade-left">
        
          
        <p data-aos="fade-up"><?= $b->Deskripsi_berita;?></p>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>