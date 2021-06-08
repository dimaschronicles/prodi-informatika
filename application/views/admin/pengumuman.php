<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/addpengumuman'); ?>" class="m-0 btn btn-primary">Buat Pengumuman</a>
        </div>

        <div class="card-body">

            <?= $this->session->flashdata('message'); ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($announcement as $a) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $a['title']; ?></td>
                                <td><?= $a['date_creation']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/detailpengumuman/<?= $a['id']; ?>" class="badge badge-primary">Detail</a>
                                    <a href="<?= base_url(); ?>admin/editpengumuman/<?= $a['id']; ?>" class="badge badge-warning">Edit</a>
                                    <a href="<?= base_url(); ?>admin/deletepengumuman/<?= $a['id']; ?>" onclick=" return confirm('Delete this data?')" class="badge badge-danger">Delete</a>
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