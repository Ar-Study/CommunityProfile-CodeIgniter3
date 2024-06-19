<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class ="p-3">Kontak Komunitas</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body overflow-auto">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Alamat Komunitas</th>
                                        <th>Nomor Hp</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kontak as $k) {
                                    ?>
                                        <tr>
                                            <td><?= $k->alamat?></td>
                                            <td><?= $k->nomor ?></td>
                                            <td><?= $k->email ?></td>
                                            <td><a href="<?= base_url('admin/kontak_edit/'.$k->id_kontak) ?>" class="btn btn-primary">Mengubah</a></td>
                                        </tr>

                                        <!-- Modal Hapus -->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
