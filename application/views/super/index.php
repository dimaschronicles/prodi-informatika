<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Dosen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Dosen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $userCount; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Pengumuman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlPengumuman; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Pengarsipan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlArsip; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Row -->

    <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
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



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->