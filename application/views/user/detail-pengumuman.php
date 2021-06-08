<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow">
        <div class="card-header">
            <p>Oleh : <?= $announcement['uploader']; ?> | <?= $announcement['date_creation']; ?></p>
        </div>
        <div class="card-body">
            <blockquote class="blockquote">
                <h3><?= $announcement['title']; ?></h3>
                <p><?= $announcement['description']; ?></p>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <?php $fName = $announcement['file_lampiran' . $i]; ?>
                    <a href="<?= base_url(); ?>user/download/<?= $fName; ?>">
                        <h6><?= $announcement['file_lampiran' . $i]; ?></h6>
                    </a>
                <?php endfor; ?>
            </blockquote>
        </div>

        <div class="card-footer">
            <a href="<?= base_url('user/pengumuman'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->