

<div class="bg-secondary py-5">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
		<div class="section" style="background-color: #CFD2CF;">
			<div class="container p-5 bg-light rounded" style="border: 1px solid #A2B5BB;">
				<div class="row mb-5">
					<div class="col-12 mb-5 order-2">
					<h5 style="background-color: LightGray;" class="font-weight-normal text-center animated slideInDown">Berita seputar dunia teknologi dan programming</h5>
            <br>
							<div class="row">
							<div class="col-md-6 form-group">
            <div>
            <?php foreach ($berita as $b) { ?>
              <img src="<?php echo base_url('img/') . $b->Foto_berita?>" alt="Image" class="img-fluid img-absolute" data-aos="fade-left">
              <div class="service">
              <a href="contact.html">
                <h3><?= $b->Judul_berita; ?></h3>
                <p style="color:Gray;"><?= $b->Deskripsi_berita; ?></p>
              </div>
            <br>

           <?php } ?>
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
