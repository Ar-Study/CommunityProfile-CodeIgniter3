<div class="content-wrapper">
    <form method="post" action="<?php echo base_url() . 'admin/galeri_add_act' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Tambah Galeri</h4>
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

        <div class="custom-file">
            <input type="file" name="foto">
            <?php echo form_error('foto'); ?>
        </div>
        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
</div>