<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow">
        <h3 class="card-header"><b><?= $title; ?></b></h3>
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $admin['image']; ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>NIDN</b></td>
                                    <td><?= $admin['nidn']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td><?= $admin['name']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td><?= $admin['address']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><?= $admin['email']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>No. Hp</b></td>
                                    <td><?= $admin['telephone']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $dosen['date_created']); ?></small></p> -->
                        <a href="<?= base_url('super/adminpage'); ?>" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->