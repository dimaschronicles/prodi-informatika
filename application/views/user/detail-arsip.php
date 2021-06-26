<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow">
        <div class="card-header">
            <p>Oleh : <?= $arsip['uploader']; ?> | <?= $arsip['date_created']; ?></p>
        </div>
        <div class="card-body">
            <blockquote class="blockquote">
                <h3><?= $arsip['title']; ?></h3>
                <p><?= $arsip['description']; ?></p>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <?php $fName = $arsip['userfile' . $i]; ?>
                    <a href="<?= base_url(); ?>user/downloadarsip/<?= $fName; ?>">
                        <h6><?= $arsip['userfile' . $i]; ?></h6>
                    </a>
                <?php endfor; ?>
            </blockquote>
        </div>

        <div class="card-footer">
            <a href="<?= base_url('user/arsip'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->