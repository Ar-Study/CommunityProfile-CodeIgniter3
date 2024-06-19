<div class="content-wrapper">
<?php foreach($sosmed as $s) { ?>
    <form method="post" action="<?php echo base_url() . 'admin/sosmed_update' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Mengubah Data Sosial Media</h4>
        <div class="form-group">
            <label for="nama_kegiatan">Nama Pengguna</label>
            <input type="text" class="form-control border-0" name="nama" placeholder="Nama Pengguna" value="<?= $s->nama_pengguna; ?>">
            <input type="hidden" class="form-control border-0" name="id" value="<?php echo $s->id_sosmed; ?>">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label>Link Sosial Media</label>
            <input type="text" class="form-control border-0" name="url" placeholder="URL Sosial Media" value="<?= $s->url; ?>">
        </div> 
        <div class="form-group">
            <label>Jenis Sosial Media</label><br>
            <input type="radio" name="jenis" value="facebook">
            <label>Facebook</label><br>
            <input type="radio" name="jenis" value="twitter">
            <label>Twitter</label><br>
            <input type="radio" name="jenis" value="instagram">
            <label>Instagram</label><br>
            <input type="radio" name="jenis" value="linkedin">
            <label>Linkedin</label><br>
        </div> 

        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
    <?php } ?>
</div>