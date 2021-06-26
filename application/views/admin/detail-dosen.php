<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow">
        <h3 class="card-header"><b><?= $title; ?></b></h3>
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $dosen['image']; ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>NIDN</b></td>
                                    <td><?= $dosen['nidn']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td><?= $dosen['name']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tempat Lahir</b></td>
                                    <td><?= $dosen['pob']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Lahir</b></td>
                                    <td><?= $dosen['dob']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td><?= $dosen['address']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td><?= $dosen['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Agama</b></td>
                                    <td><?= $dosen['religion']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><?= $dosen['email']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>No. Hp</b></td>
                                    <td><?= $dosen['telephone']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $dosen['date_created']); ?></small></p> -->
                        <a href="<?= base_url('admin/dosen'); ?>" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->