<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow">
        <h3 class="card-header"><b><?= $title; ?></b></h3>
        <div class="card-body">
            <form action="<?= base_url('super/addpengumuman'); ?>" method="POST" enctype="multipart/form-data">
                <div id="dynamic_field">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul pengumuman..." value="<?= set_value('title'); ?>">
                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Keterangan pengumuman..."><?= set_value('description'); ?></textarea>
                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="file_lampiran1">Lampiran File 1</label>
                        <input type="file" class="form-control-file" id="file_lampiran1" name="file_lampiran1">
                        <?= form_error('file_lampiran1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn_add btn-success" id="add" name="add" onclick="">Tambah Lampiran</button>
                    <small class="text-secondary pl-3">Maksimal jumlah 10 file</small>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Pengumuman</button>
                <a href="<?= base_url('super/pengumuman'); ?>" class="btn btn-secondary">Kembali</a>

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
                $('#dynamic_field').append('<div id="row' + i + '"><div class="form-group"><label for="file_lampiran' + i + '">Lampiran File ' + i + '</label><input type="file" class="form-control-file" id="file_lampiran' + i + '" name="file_lampiran' + i + '"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove mt-2" id="' + i + '"><i class="fas fa-times"></i></button></div></div></div>');
            }
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();
            $('#' + button_id + '').remove();

        });

    });

    // $(document).ready(function() {
    //     var i = 1;
    //     var max = 9;

    //     $('#add').click(function() {

    //         if (i >= 9) {
    //             $(document).on('click', '.btn_add', function() {
    //                 document.getElementById("add").style.visibility = "hidden";
    //                 document.getElementById("note").style.visibility = "hidden";
    //             })
    //         } else if (i <= 9) {

    //             $(document).on('click', '.btn_remove', function() {
    //                 var button_id = $(this).attr("id");

    //                 $('#row' + button_id + '').remove();
    //                 $('#' + button_id + '').remove();

    //                 document.getElementById("add").style.visibility = "visible";
    //                 document.getElementById("note").style.visibility = "visible";
    //             });

    //         }

    //         i++;
    //         $('#dynamic_field').append('<div id="row' + i + '"><div class="form-group"><label for="file_lampiran' + i + '">Lampiran File ' + i + '</label><input type="file" class="form-control-file" id="file_lampiran' + i + '" name="file_lampiran' + i + '"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove mt-2" id="' + i + '"><i class="fas fa-times"></i></button></div></div></div>');

    //     });

    // });
</script>