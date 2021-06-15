<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Show Data Menu -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/addarsip'); ?>" class="m-0 btn btn-primary">Buat Arsip</a>
        </div>

        <div class="card-body">

            <?= $this->session->flashdata('message'); ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Judul</th>
                            <th scope="col">File</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Uploader</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j = 1; ?>
                        <?php foreach ($arsip as $a) : ?>
                            <tr>
                                <th scope="row"><?= $j; ?></th>
                                <td><?= $a['name']; ?></td>
                                <td><?= $a['title']; ?></td>
                                <td>
                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                        <?php if (!empty($a['userfile' . $i])) : ?>
                                            <?= $a['userfile' . $i]; ?><br>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </td>
                                <td><?= $a['uploader']; ?></td>
                                <td><?= $a['date_created']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/editarsip/<?= $a['id_file']; ?>" class="badge badge-warning">Edit</a>
                                    <a href="<?= base_url(); ?>admin/deletearsip/<?= $a['id_file']; ?>" class="badge badge-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $j++; ?>
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