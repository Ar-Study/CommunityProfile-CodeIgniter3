<div class="bg-secondary py-5">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-7">
            </div>
        </div>
    </div>
    <div class="section" >
        <div class="container p-5 bg-light rounded" style="border: 1px solid #A2B5BB;">
            <h5 style="background-color: LightGray;" class="font-weight-normal text-center animated slideInDown">Berita seputar dunia teknologi dan programming</h5>
            <br>
            <div class="row">
                <?php
                // ambil data berita dari array $berita
                $data = $berita;

                // tentukan jumlah berita per halaman
                $per_page = 3;

                // tentukan halaman saat ini
                $current_page = isset($page) ? $page : 1;

                // hitung total jumlah halaman
                $total_pages = ceil(count($data) / $per_page);

                // tampilkan hanya 3 berita di halaman pertama
                if ($current_page == 1) {
                    $halaman_pertama = array_slice($data, 0, $per_page);
                } else {
                    // tampilkan berita sesuai halaman yang diinginkan
                    $offset = ($current_page - 1) * $per_page;
                    $halaman_pertama = array_slice($data, $offset, $per_page);
                }

                foreach ($halaman_pertama as $b) {
                ?>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo base_url('img/') . $b->Foto_berita?>" alt="Image" class="card-img-top img-fluid img-absolute" data-aos="fade-left">
                            <div class="card-body">
                                <h5 class="card-title"><?= $b->Judul_berita; ?></h5>
                                <p class="card-text"><?= substr($b->Deskripsi_berita, 0, 100); ?>...</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item <?php echo $current_page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?php echo site_url('auth/news/'.($current_page-1)) ?>">Previous</a>
                    </li>
                    <?php for ($i=1; $i <= $total_pages; $i++) { ?>
                        <li class="page-item <?php echo $current_page == $i ? 'active' : '' ?>">
                            <a class="page-link" href="<?php echo site_url('auth/news/'.$i) ?>"><?php echo $i ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?php echo $current_page == $total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?php echo site_url('auth/news/'.($current_page+1)) ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
