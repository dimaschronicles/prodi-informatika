<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            <a href="<?= base_url('super/addadmin'); ?>" type="button" class="btn btn-primary">Tambah Admin</a>

            <div class="mt-3"><?= $this->session->flashdata('message'); ?></div>

            <div class="table-responsive">
                <table class="table table-hover mt-1" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($admin as $a) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><img src="<?= base_url('assets/img/profile/') . $a['image']; ?>" class="img-thumbnail" width="120px"></td>
                                <td><?= $a['name']; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>super/detailadmin/<?= $a['id_user']; ?>" class="badge badge-primary">Detail</a>
                                    <a href="<?= base_url(); ?>super/deleteadmin/<?= $a['id_user']; ?>" class="badge badge-danger" onClick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
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