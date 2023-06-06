<div class="content-wrapper">
    <?php foreach ($galeri as $g) { ?>
        <form method="post" action="<?php echo base_url() . 'admin/galeri_update' ?>" enctype="multipart/form-data" class="p-5">
            <h4 class="text-center">Mengubah Galeri</h4>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control border-0" name="nama" placeholder="Nama Lengkap" value="<?php echo $g->Nama_foto;  ?>">
                <input type="hidden" class="form-control border-0" name="id" placeholder="Nama Lengkap" value="<?php echo $g->Id_foto;  ?>">
                <?php echo form_error('nama'); ?>
            </div>
            <div class="form-group">
                <label for="">Deskripsi Diri</label>
                <input type="text" class="form-control border-0" name="deskripsi" placeholder="Jelaskan tentang dirimu disini" value="<?php echo $g->Deskripsi_foto; ?>">
                <?php echo form_error('deskripsi'); ?>
            </div>
            <div class="form-group">
                <label for="">Link Github</label>
                <input type="text" class="form-control border-0" name="github" placeholder="Masukan Link Github Anda" value="<?php echo $g->Portofolio; ?>">
                <?php echo form_error('github'); ?>
            </div>
            <div class="form-group">
                <label for="">Link Linkedin</label>
                <input type="text" class="form-control border-0" name="linkedin" placeholder="Masukan Link Linkedin Anda" value="<?php echo $g->linkedin; ?>">
                <?php echo form_error('linkedin'); ?>
            </div>
            <div class="custom-file">
                
                <label for="">Uploud CV </label>
                <input type="hidden" name="cv_old" value="<?php echo $g->CV ?>">
                <input type="file" name="cv">
                <?php echo form_error('cv'); ?>
                <br>
            </div>
            <div class="custom-file">
                <input type="hidden" name="foto_old" value="<?php echo $g->Foto ?>">
                <img src="<?php echo base_url() . './img/' . $g->Foto; ?>" alt="" width="100px" class="my-2"> <br>
                <input type="file" name="foto">
                <?php echo form_error('foto'); ?>
            </div>
            
            <button class="btn btn-primary my-5" name="save">Simpan</button>
        </form>
    <?php } ?>
</div>                              