<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kegiatan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="<?php echo base_url() . 'admin/kegiatan_add' ?>" class="btn btn-primary">Tambahkan Data</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama </th>
                                        <th>Logo </th>
                                        <th>Deskripsi</th>
                                        <th>Modify</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kegiatan as $k) {
                                    ?>
                                        <tr>
                                            <td><?php echo $k->nama_kegiatan ?></td>
                                            <td><img style="width: 100px;" src="<?php echo base_url() . './img/' . $k->logo_kegiatan ?>" alt="">
                                            </td>
                                            <td><?php echo $k->isi_kegiatan ?></td>

                                            <td><a href="<?php echo base_url() . 'admin/kegiatan_edit/' . $k->id_kegiatan ?>" class="btn btn-primary">Mengubah</a></td>
                                            <td><a class="btn btn-danger" data-toggle="modal" data-target="#hapuslah">Menghapus</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="hapuslah" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSayaLabel">Apakah anda yakin ingin menghapus?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <?php foreach ($kegiatan as $k) { ?>
                    <form method="post" action="<?php echo base_url() . 'admin/kegiatan_hapus' ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" class="form-control border-0" name="id" value="<?php echo  $k->id_kegiatan; ?>">
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="foto_old" value="<?php echo $k->logo_kegiatan ?>">
                        </div>
                        <button name='save' class="btn btn-primary">Yakin</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>