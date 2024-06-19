<div class="content-wrapper">
    <?php foreach($profil as $p) { ?>
    <form method="post" action="<?php echo base_url() . 'admin/profile_update' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Tambah Informasi Profil</h4>
        <div class="form-group">
            <label for="nama_kegiatan">Judul Informasi</label>
            <input type="text" class="form-control border-0" name="nama" placeholder="Judul Infomrasi" value = "<?= $p->judul_profil; ?>">
            <input type="hidden" class="form-control border-0" name="id" value="<?php echo $p->id_profil; ?>">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label>Detail Informasi</label>
            <input type="hidden" name="content" value="">
                <div id="editor" style="min-height: 160px;" >
                    <?= $p->isi_profil; ?>
                </div>
        </div>
        <div class="custom-file">
            <input type="hidden" name="foto_old" value="<?php echo $p->foto_profil ?>">
            <input type="file" name="foto" value="">
            <?php echo form_error('foto'); ?>
        </div>

        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
    <?php } ?>
</div>