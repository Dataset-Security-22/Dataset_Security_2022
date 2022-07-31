<div id="inputpesanan-modal" class="modal fade login-component" role="dialog">
  <div class="modal-dialog ">

    <div class="modal-content">
      <div class="modal-body">
        <div class="login-block">

          <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>


          <div class="form-group">
            <label>Dari</label>
            <input type="text" class="form-control" id="dari">
            <input type="hidden" class="form-control" id="id">
            <input type="hidden" class="form-control" id="invoice">
          </div>

          <div class="form-group">
            <label>Tujuan</label>
            <input type="text" class="form-control" id="tujuan">
          </div>

          <div class="form-group">
            <label>Berapa Hari?</label>
            <input type="number" min="1" class="form-control" id="hari">
          </div>

          <div class="form-group">
            <button class="btn btn-2primary" id="kirim">Kirim</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@csrf
<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
      }
    });

    $("#kirim").on('click', function () {
      let dari = $("#dari").val().trim();
      let tujuan = $("#tujuan").val().trim();
      let id = $("#id").val().trim();
      let invoice = $("#invoice").val().trim();
      let hari = $("#hari").val().trim();

      if (dari == "" || tujuan == "" || hari == "") {
        swal("Ooops!", "Maaf form harap diisi!", "error");
      } else {
        if (hari == 0) {
          swal("Ooops!", "Maaf form hari diisi minimal 1 hari!", "error");
        } else {
          $.ajax({
            url: "/kendaraan/"+id+"/"+invoice,
            type: "post",
            data: {dari: dari, hari: hari, tujuan: tujuan, _token: $("input[name='_token']").val()},
            success: function (response) {
              if (response == 1) {
                $("#dari").val('')
                $("#tujuan").val('')
                $("#inputpesanan-modal").modal('hide')
                swal("Wooww!", "Data anda sedang di proses", "success");
              } else {
                swal("Ooops", "Data gagal diproses!", "error");
              }
            }
          });
        }
      }
    })

    $("body").on('click', '#pesan', function () {
      let id = $(this).data('id');
      let invoice = $(this).data('invoice');

      $("#id").val(id)
      $("#invoice").val(invoice)
    })
  })
</script>