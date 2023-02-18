<div class="content-wrapper">
    <form method="post" action="<?php echo base_url() . 'admin/kegiatan_add_act' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Tambah Kegiatan</h4>
        <div class="form-group">
            <input type="text" class="form-control border-0" name="nama" placeholder="Nama Kegiatan">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control border-0" name="content" placeholder="isi Kegiatan">
            <?php echo form_error('content'); ?>
        </div>

        <div class="custom-file">
            <input type="file" name="foto">
            <?php echo form_error('foto'); ?>
        </div>
        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
</div>