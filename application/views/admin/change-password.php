<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('admin/changepassword'); ?>" method="POST">
                <div class="form-group">
                    <label for="current_password">Password Saat Ini</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="new_password1">Password Baru</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="new_password2">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="defaultCheck1" onclick="myFunction()">
                        <label class="form-check-label" for="defaultCheck1">
                            Tampilkan Password
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan Password</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    function myFunction() {
        var current_pass = document.getElementById("current_password");
        var new_pass = document.getElementById("new_password1");
        var conf_pass = document.getElementById("new_password2");
        if (current_pass.type === "password" && new_pass.type === "password" && conf_pass.type === "password") {
            current_pass.type = "text";
            new_pass.type = "text";
            conf_pass.type = "text";
        } else {
            current_pass.type = "password";
            new_pass.type = "password";
            conf_pass.type = "password";
        }
    }
</script>