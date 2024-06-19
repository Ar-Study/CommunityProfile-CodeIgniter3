<div class="content-wrapper">
    <form method="post" action="<?php echo base_url() . 'admin/kegiatan_add_act' ?>" enctype="multipart/form-data" class="p-5">
        <h4 class="text-center">Tambah Kegiatan</h4>
        <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" class="form-control border-0" name="nama" placeholder="Nama Kegiatan">
            <?php echo form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label>Penjelasan Singkat</label>
            <input type="text" class="form-control border-0" name="content" placeholder="isi Kegiatan">
            <?php echo form_error('content'); ?>
        </div>
        <div class="form-group">
            <label>Tempat Pelaksanaan</label>
            <input type="text" class="form-control border-0" name="lokasi" placeholder="Lokasi Kegiatan">
            <?php echo form_error('lokasi');  ?>
        </div>
        <div class="form-group">
            <label for="jenis_kegiatan">Jenis Kegiatan</label>
            <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                <option value="individu">Kegitan Individu</option>
                <option value="kelompok">Kegiatan Kelompok</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_kegiatan">Tanggal Pelaksanaan Kegiatan</label>
            <input type="date" class="form-control border-0" name="tanggal_kegiatan" placeholder="Tanggal Kegiatan">
            <?php echo form_error('tanggal_kegiatan'); ?>
        </div>
        <div class="custom-file">
            <input type="file" name="foto">
            <?php echo form_error('foto'); ?>
        </div>

        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>
</div>