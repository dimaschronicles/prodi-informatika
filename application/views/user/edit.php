<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="nidn" class="col-sm-2 col-form-label">NIDN</label>
                <div class="col-sm-10">
                    <input type="nidn" class="form-control" id="nidn" name="nidn" value="<?= $user['nidn']; ?>" readonly>
                    <?= form_error('nidn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pob" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pob" name="pob" placeholder="ex : Purwokerto" value="<?= $user['pob']; ?>">
                    <?= form_error('pob', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="dob" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="dob" name="dob" value="<?= date('Y-m-d', strtotime($user['dob'])); ?>">
                    <?= form_error('dob', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea type="address" class="form-control" id="address" name="address" placeholder="Alamat Lengkap"><?= $user['address']; ?></textarea>
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" id="gender" name="gender">
                        <?php $jk = $user['gender']; ?>
                        <option value="0">-- Pilih Salah Satu --</option>
                        <option value="Laki-laki" <?php if ($jk == "Laki-laki") echo 'selected="selected"';  ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($jk == "Perempuan") echo 'selected="selected"';  ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="religion" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                    <select class="form-control" id="religion" name="religion">
                        <?php $agama = $user['religion']; ?>
                        <option value="0">-- Pilih Salah Satu --</option>
                        <option value="Islam" <?php if ($agama == "Islam") echo 'selected="selected"'; ?>>Islam</option>
                        <option value="Kristen" <?php if ($agama == "Kristen") echo 'selected="selected"'; ?>>Kristen</option>
                        <option value="Katholik" <?php if ($agama == "Katholik") echo 'selected="selected"'; ?>>Katholik</option>
                        <option value="Hindu" <?php if ($agama == "Hindu") echo 'selected="selected"'; ?>>Hindu</option>
                        <option value="Budha" <?php if ($agama == "Budha") echo 'selected="selected"'; ?>>Budha</option>
                        <option value="Lainnya" <?php if ($agama == "Lainnya") echo 'selected="selected"'; ?>>Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Aktif" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="telephone" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="telephone" class="form-control" id="telephone" name="telephone" placeholder="No. Telp" value="<?= $user['telephone']; ?>">
                    <?= form_error('telephone', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class=" form-group row">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->