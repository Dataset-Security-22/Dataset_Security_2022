<div id="tolak-modal" class="modal fade login-component" role="dialog">
  <div class="modal-dialog ">

    <div class="modal-content">
      <div class="modal-body">
        <div class="login-block">

          <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>

          <h3>Announcement</h3>

          <div class="form-group">
            <p>Lorem, ipsum dolor sit, amet consectetur adipisicing elit. Nostrum atque hic cupiditate temporibus excepturi veritatis, facere esse error quibusdam non ad at inventore eligendi quis quas sequi, eos vero, dicta.</p>
          </div>          

          <div class="form-group">
            <input type="hidden" id="invoiceTolak">
            <input type="hidden" id="kendaraanTolak">
            <button class="btn btn-primary" id="tolakConfirm">Tolak</button>
            <button class="btn btn-2primary" data-dismiss="modal">Kembali</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $("body").on('click', '#tolakConfirm', function () {
      let invoice = $("#invoiceTolak").val().trim();
      let kendaraan = $("#kendaraanTolak").val().trim();

      if (invoice) {
        $.ajax({
          url: '/pinjaman/tolak',
          type: 'post',
          data: {invoice: invoice, kendaraan: kendaraan, _method: 'patch'},
          success: function (response) {
            if (response == 1) {
              swal('Wooww!', 'Data berhasil disimpan', 'success');
              loadPesanan();
              loadPesananTolak();
              loadPesananSetuju();
              $("#tolak-modal").modal('hide');
            } else {
              swal('Ooops!', 'Data gagal disimpan', 'error');
            }
          }
        })
      } else {
        swal("Ooops!", 'Invoice harap diisi!', 'error')
      }
    })
  })
</script>