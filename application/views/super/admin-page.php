<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Show Data Menu -->
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col">

                    <button type="button" class="btn btn-primary">Tambah Admin</button>

                    <table class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($admin as $a) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $a['name']; ?></td>
                                    <td><?= $a['email']; ?></td>
                                    <td><i>Tidak dapat dilihat</i></td>
                                    <td>
                                        <a href="" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>

</div>
<!-- End of Main Content -->