<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow">
        <h3 class="card-header"><b><?= $title; ?></b></h3>
        <div class="card-body">
            <form action="<?= base_url('admin/addarsip'); ?>" method="POST" enctype="multipart/form-data">
                <div id="dynamic_field">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul">
                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Keterangan"></textarea>
                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                            Pilih Dosen
                        </button>
                        <?= form_error('id_dosen[]', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="userfile1">File 1</label>
                        <input type="file" class="form-control-file" id="userfile1" name="userfile1">
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-success" id="add" name="add">Tambah Lampiran</button>
                    <small class="text-secondary pl-3">Max 10 file</small>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pilih Dosen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="checkall" id="checkall" onClick="check_uncheck_checkbox(this.checked);">
                                    <label class="form-check-label"><b>Pilih Semua</b></label>
                                </div>

                                <?php foreach ($dosen as $d) : ?>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="id_dosen[]" name="id_dosen[]" value="<?= $d['id_user']; ?>">
                                        <label class="form-check-label" for="dosen"><?= $d['name']; ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="class-footer">
                    <button type="submit" class="btn btn-primary">Simpan Arsip</button>
                    <a href="<?= base_url('admin/arsip'); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var i = 1;
        var max = 9;

        $('#add').click(function() {
            if (i <= 9) {
                i++;
                $('#dynamic_field').append('<div id="row' + i + '"><div class="form-group"><label for="userfile' + i + '">File ' + i + '</label><input type="file" class="form-control-file" id="userfile' + i + '" name="userfile' + i + '"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove mt-2" id="' + i + '"><i class="fas fa-times"></i></button></div></div></div>');
            }
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();
            $('#' + button_id + '').remove();

        });

    });

    function check_uncheck_checkbox(isChecked) {
        if (isChecked) {
            $('input[name="id_dosen[]"]').each(function() {
                this.checked = true;
            });
        } else {
            $('input[name="id_dosen[]"]').each(function() {
                this.checked = false;
            });
        }
    }
</script>