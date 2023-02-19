<div class="content-wrapper">
    <?php foreach ($berita as $b) { ?>
        <form method="post" action="<?php echo base_url() . 'admin/berita_update' ?>" enctype="multipart/form-data" class="m-5">
            <h4 class="text-center">Data Berita</h4>
            <div class="form-group">
                <input type="text" class="form-control border-0" name="nama" placeholder="Judul Berita" value="<?php echo $b->Judul_berita; ?>">
                <input type="hidden" class="form-control border-0" name="id" value="<?php echo $b->Id_berita; ?>">
                <?php echo form_error('nama'); ?>
                
            </div>
            <div class="form-group">
                <input type="hidden" name="content" value="<?= $b->Deskripsi_berita ?>">
                <div id="editor" style="min-height: 160px;">
                    <?= $b->Deskripsi_berita ?>
                </div>
                <?php echo form_error('content'); ?>
            </div>

            <div class="custom-file">
                <input type="hidden" name="foto_old" value="<?php echo $b->Foto_berita ?>">
                <img src="<?php echo base_url() . './img/' . $b->Foto_berita ?>" alt="" width="100px" class="my-3">
                <br>
                <input type="file" name="foto" value="">
                <?php echo form_error('foto'); ?>
            </div>
            <div class="form-group">
                <label class="m-3">Tanggal Publish</label>
                <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <button class="btn btn-primary my-5" name="save">Simpan</button>
        </form>
    <?php } ?>
</div>
