<div class="content-wrapper">
    <form method="post" action="<?php echo base_url() . 'admin/berita_add_act' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Tambah Berita</h4>
        <div class="form-group">
            <input type="text" class="form-control border-0" name="nama" placeholder="Judul Berita">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <input type="hidden" name="content" value="<?= set_value('content') ?>">
            <div id="editor" style="min-height: 160px;"><?= set_value('content') ?></div>
            <?php echo form_error('content'); ?>
        </div>

        <div class="custom-file">
            <input type="file" name="foto">
            <?php echo form_error('foto'); ?>
        </div>
        <div class="form-group">
            <label class="m-3">Tanggal Publish</label>
            <input type="date" class="form-control border-0" name="tanggal">
            <?php echo form_error('tanggal'); ?>
        </div>
        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
</div>