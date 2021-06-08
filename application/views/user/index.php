<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4">Selamat Datang di Website Prodi Informatika Universitas Amikom Purwokerto.</p>

    <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <!-- Card Profile -->
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>NIDN</b></td>
                                <td><?= $user['nidn']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                <td><?= $user['name']; ?></td>
                            </tr>
                            <tr>
                                <td><b>No. Hp</b></td>
                                <td><?= $user['telephone']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td><?= $user['gender']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td><?= $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td><?= $user['address']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p> -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->