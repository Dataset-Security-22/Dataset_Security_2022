<div id="setuju-modal" class="modal fade login-component" role="dialog">
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
            <input type="hidden" id="invoiceSetuju">
            <input type="hidden" id="kendaraanSetuju">
            <button class="btn btn-2primary" id="setujuConfirm">Setuju</button>
            <button class="btn" data-dismiss="modal">Kembali</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $("body").on('click', '#setujuConfirm', function () {
      let invoice = $("#invoiceSetuju").val().trim();
      let kendaraan = $("#kendaraanSetuju").val().trim();

      if (invoice) {
        $.ajax({
          url: '/pinjaman/setuju',
          type: 'post',
          data: {invoice: invoice, kendaraan: kendaraan, _method: 'patch'},
          success: function (response) {
            if (response == 1) {
              swal('Wooww!', 'Data berhasil disimpan', 'success');
              loadPesanan();
              loadPesananTolak();
              loadPesananSetuju();
              $("#setuju-modal").modal('hide');
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