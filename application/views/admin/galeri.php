<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Galeri</h1>
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
                            <h3 class="card-title"><a href="<?= base_url('admin/galeri_add') ?>" class="btn btn-primary">Tambahkan Data</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Github</th>
                                        <th>CV</th>
                                        <th>Modify</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($galeri as $g) {
                                    ?>
                                        <tr>
                                            <td><?= $g->Nama_foto ?></td>
                                            <td><img style="width: 100px;" src="<?= base_url('img/'.$g->Foto) ?>" alt=""></td>
                                            <td><?= $g->Deskripsi_foto ?></td>
                                            <td><?= $g->Portofolio ?></td>
                                            <td><?= $g->CV ?></td>
                                            <td><a href="<?= base_url('admin/galeri_edit/'.$g->Id_foto) ?>" class="btn btn-primary">Mengubah</a></td>
                                            <td>
                                                <a class="btn btn-danger" data-toggle="modal" data-target="#hapuslah<?= $g->Id_foto ?>">Menghapus</a>
                                            </td>
                                        </tr>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapuslah<?= $g->Id_foto ?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalSayaLabel">Apakah anda yakin ingin menghapus?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="<?= base_url('admin/galeri_hapus') ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control border-0" name="id" value="<?= $g->Id_foto ?>">
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="hidden" name="foto_old" value="<?= $g->Foto ?>">
                                                            </div>
                                                            <button name="save" class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
