<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Berita</h1>
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
                            <h3 class="card-title"><a href="<?= base_url('admin/berita_add') ?>" class="btn btn-primary">Tambahkan Data</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Modify</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($berita as $b): ?>
                                        <tr>
                                            <td><?= $b->Judul_berita ?></td>
                                            <td><img style="width: 100px;" src="<?= base_url('./img/'.$b->Foto_berita) ?>" alt=""></td>
                                            <td><?= $b->Deskripsi_berita ?></td>
                                            <td><?= $b->Tanggal_berita ?></td>
                                            <td><a href="<?= base_url('admin/berita_edit/'.$b->Id_berita) ?>" class="btn btn-primary">Mengubah</a></td>
                                            <td><a class="btn btn-danger" data-toggle="modal" data-target="#hapuslah<?= $b->Id_berita ?>">Menghapus</a></td>
                                        </tr>
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapuslah<?= $b->Id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalSayaLabel">Apakah anda yakin ingin menghapus?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="<?= base_url('admin/berita_hapus') ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control border-0" name="id" value="<?= $b->Id_berita ?>">
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="hidden" name="foto_old" value="<?= $b->Foto_berita ?>">
                                                            </div>
                                                            <button type="submit" name="save" class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                   
