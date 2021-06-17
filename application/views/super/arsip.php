<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Show Data Menu -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('super/addarsip'); ?>" class="m-0 btn btn-primary">Buat Arsip</a>
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
                                <td><?= $a['date_created']; ?></td>
                                <td><?= $a['uploader']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>super/editarsip/<?= $a['id_file']; ?>" class="badge badge-warning">Edit</a>
                                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah data ini akan dihapus?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                            <a href="<?= base_url(); ?>super/deletearsip/<?= $a['id_file']; ?>" class="btn btn-primary">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
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