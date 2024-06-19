<div class="content-wrapper">
    <form method="post" action="<?php echo base_url() . 'admin/sosmed_add_act' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Tambah Sosial Media</h4>
        <div class="form-group">
            <label for="nama_kegiatan">Nama Pengguna</label>
            <input type="text" class="form-control border-0" name="nama" placeholder="Nama Pengguna">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label>Link Sosial Media</label>
            <input type="text" class="form-control border-0" name="url" placeholder="URL Sosial Media">
        </div> 
        <div class="form-group">
            <label>Jenis Sosial Media</label><br>
            <input type="radio" name="jenis" value="facebook">
            <input type="radio" name="jenis" value="twitter">
            <label>Twitter</label><br>
            <input type="radio" name="jenis" value="instagram">
            <label>Instagram</label><br>
            <input type="radio" name="jenis" value="linkedin">
            <label>Linkedin</label><br>
        </div> 

        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
</div>