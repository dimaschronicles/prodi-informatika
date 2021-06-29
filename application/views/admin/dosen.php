<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="<?= base_url('admin/adddosen'); ?>" class="btn btn-primary">Tambah Data Dosen</a>

            <div class="mt-3"><?= $this->session->flashdata('message'); ?></div>

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

            <div class="table-responsive">
                <table class="table table-hover mt-3" id="dataTable" width="100%" cellspacing="0">
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
                                    <a href="<?= base_url(); ?>admin/detaildosen/<?= $d['id_user']; ?>" class="badge badge-primary">Detail</a>
                                    <a href="<?= base_url(); ?>admin/deletedosen/<?= $d['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Apakah data ini akan dihapus?');">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- End of Main Content -->

</div>
<!-- End of Main Content -->