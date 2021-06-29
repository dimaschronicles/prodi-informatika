<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Uploader</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($announcement as $a) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><a href="<?= base_url(); ?>user/detailpengumuman/<?= $a['id']; ?>"><?= $a['title']; ?></a></td>
                                <td><?= $a['uploader']; ?></td>
                                <td><?= $a['date_creation']; ?></td>
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