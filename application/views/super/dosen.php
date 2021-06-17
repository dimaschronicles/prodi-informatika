<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Show Data Menu -->
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col">

                    <?= $this->session->flashdata('message'); ?>

                    <a href="<?= base_url('super/adddosen'); ?>" class="btn btn-primary">Tambah Data Dosen</a>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari data dosen..." name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php if (empty($dosen)) : ?>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            Data dosen tidak ditemukan.
                        </div>
                    <?php endif; ?>

                    <table class="table table-hover mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">NIDN</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($dosen as $d) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><img src="<?= base_url('assets/img/profile/') . $d['image']; ?>" class="img-thumbnail" width="120px"></td>
                                    <td><?= $d['nidn']; ?></td>
                                    <td><?= $d['name']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>super/detaildosen/<?= $d['id_user']; ?>" class="badge badge-primary">Detail</a>
                                        <a href="" class="badge badge-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Apakah data ini akan dihapus?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="<?= base_url(); ?>super/deletedosen/<?= $d['id_user']; ?>" class="btn btn-primary">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->