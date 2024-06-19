<div class="content-wrapper">
<?php foreach($kontak as $k) { ?>
    <form method="post" action="<?php echo base_url() . 'admin/kontak_update' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Mengubah Data Kontak</h4>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control border-0" name="nama" placeholder="Nama Pengguna" value="<?= $k->alamat; ?>">
            <input type="hidden" class="form-control border-0" name="id" value="<?php echo $k->id_kontak; ?>">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label>Nomor</label>
            <input type="text" class="form-control border-0" name="nomor" placeholder="Nomor" value="<?= $k->nomor; ?>">
        </div> 
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control border-0" name="email" placeholder="Email" value="<?= $k->email; ?>">
        </div> 

        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
    <?php } ?>
</div>