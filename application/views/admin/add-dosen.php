<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow">
        <h3 class="card-header"><b><?= $title; ?></b></h3>
        <div class="card-body">
            <form action="<?= base_url('admin/adddosen'); ?>" method="POST">
                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" placeholder="1020304050">
                    <?= form_error('nidn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class=" form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Dosen">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class=" form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="nama@gmail.com">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class=" form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" id="address" name="address" aria-rowspan="3" placeholder="Jln. Riyanto">
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" aria-rowspan="3" placeholder="+62">
                    <?= form_error('telephone', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="<?= base_url('admin/dosen'); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->