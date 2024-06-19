<div class="content-wrapper">
    <form method="post" action="<?php echo base_url() . 'admin/profile_add_act' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Tambah Informasi Profil</h4>
        <div class="form-group">
            <label for="nama_kegiatan">Judul Informasi</label>
            <input type="text" class="form-control border-0" name="nama" placeholder="Judul Infomrasi">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label>Detail Informasi</label>
            <input type="hidden" name="content" value="">
                <div id="editor" style="min-height: 160px;">
                    
                </div>
        </div>
        <div class="custom-file">
            <input type="file" name="foto">
            <?php echo form_error('foto'); ?>
        </div>

        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
</div>