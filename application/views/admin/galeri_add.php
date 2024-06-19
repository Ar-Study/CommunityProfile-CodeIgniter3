<div class="content-wrapper">
        <form method="post" action="<?php echo base_url() . 'admin/galeri_add_act' ?>" enctype="multipart/form-data" class="p-5">
            <h4 class="text-center">Tambah Talent</h4>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control border-0" name="nama" placeholder="Nama Lengkap">
                <?php echo form_error('nama'); ?>
            </div>
            <div class="form-group">
                <label for="">Deskripsi Diri</label>
                <input type="text" class="form-control border-0" name="deskripsi" placeholder="Jelaskan tentang dirimu disini">
                <?php echo form_error('deskripsi'); ?>
            </div>
            <div class="form-group">
                <label for="">Bahasa yang dikuasai</label>
                <input type="text" class="form-control border-0" name="bahasa" placeholder="Bahasa pemrograman apa yang dikuasai">
                <?php echo form_error('deskripsi'); ?>
            </div>
            <div class="form-group">
                <label for="">Link Github</label>
                <input type="text" class="form-control border-0" name="github" placeholder="Masukan Link Github Anda">
                <?php echo form_error('github'); ?>
            </div>
            <div class="form-group">
                <label for="">Link Linkedin</label>
                <input type="text" class="form-control border-0" name="linkedin" placeholder="Masukan Link Linkedin Anda">
                <?php echo form_error('linkedin'); ?>
            </div>
            <div class="custom-file">
                
                <label for="">Uploud CV </label>
                <input type="file" name="cv">
                <?php echo form_error('cv'); ?>
                <br>
            </div>
            <div class="custom-file">
                <input type="file" name="foto">
                <?php echo form_error('foto'); ?>
            </div>
            
            <button class="btn btn-primary my-5" name="save">Simpan</button>
        </form>
</div>                              