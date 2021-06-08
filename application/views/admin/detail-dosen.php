<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card mb-3 shadow" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $dosen['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $dosen['nidn']; ?></h5>
                    <p class="card-text"><b>Name</b> : <?= $dosen['name']; ?></p>
                    <p class="card-text"><b>Email</b> : <?= $dosen['email']; ?></p>
                    <p class="card-text"><b>Address</b> : <?= $dosen['address']; ?></p>
                    <p class="card-text"><b>Gender</b> : <?= $dosen['gender']; ?></p>
                    <p class="card-text"><b>Telephone</b> : <?= $dosen['gender']; ?></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->