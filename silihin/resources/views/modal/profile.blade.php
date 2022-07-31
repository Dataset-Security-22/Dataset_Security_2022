<div id="profile-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">

        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">

                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>

                    <div id="profile-form">
                        @csrf
                        <div class="form-group">
                            <label>Masukan No. WA</label>
                            <input type="text" id="telepon" name="telepon" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" id="simpanProfile">Simpan</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
            }
        });

        $("#simpanProfile").on('click', function () {
            let telepon = $("input#telepon").val().trim();
            let alamat = $("textarea#alamat").val().trim();

            if (telepon == "" && alamat == "") {
                swal('Ooops!', 'Form telepon dan alamat harap diisi!', 'error');
            } else if (telepon == "") {
                swal('Ooops!', 'Form telepon harap diisi!', 'error');
            } else if (alamat == "") {
                swal('Ooops!', 'Form alamat harap diisi!', 'error');
            } else {
                $.ajax({
                    url: '/profile/telepon',
                    type: 'post',
                    data: {telepon: telepon, alamat: alamat},
                    success: function (response) {
                        if (response == 1) {
                            swal('Wooww!', 'Data berhasil disimpan', 'success');
                            $("input#telepon").val('');
                            $("textarea#alamat").val('');
                            $("#profile-modal").modal('hide');
                        } else {
                            swal('Ooops!', 'Data gagal disimpan', 'error');
                        }
                    }
                })
            }

        })
    })
</script>