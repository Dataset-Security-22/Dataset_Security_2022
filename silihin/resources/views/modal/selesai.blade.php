<div id="selesai-modal" class="modal fade login-component" role="dialog">
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
            <input type="hidden" id="invoiceSelesai">
            <input type="hidden" id="kendaraanSelesai">
            <button class="btn btn-2primary" id="selesaiConfirm">Selesai?</button>
            <button class="btn" data-dismiss="modal">Kembali</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $("body").on('click', '#selesaiConfirm', function () {
      let invoice = $("#invoiceSelesai").val().trim();
      let kendaraan = $("#kendaraanSelesai").val().trim();

      if (invoice) {
        $.ajax({
          url: '/pinjaman/selesai',
          type: 'post',
          data: {invoice: invoice, kendaraan: kendaraan, _method: 'patch'},
          success: function (response) {
            if (response == 1) {
              swal('Wooww!', 'Data berhasil disimpan', 'success');
              loadPesanan();
              loadPesananTolak();
              loadPesananSetuju();
              $("#selesai-modal").modal('hide');
            } else {
              swal('Ooops!', 'Data gagal disimpan', 'error');
            }
          }
        })
      } else {
        swal("Ooops!", 'Invoice harap diisi!', 'error')
      }
    })

    $("body").on('click', '#selesai', function () {
      let invoice = $(this).data('id');
      let kendaraan = $(this).data('kendaraan');

      $('#invoiceSelesai').val(invoice);
      $('#kendaraanSelesai').val(kendaraan);
    })
  })
</script>