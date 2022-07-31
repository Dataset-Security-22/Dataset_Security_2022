@extends('template/second')

@section('content')

@if (session('message2'))
{!! session('message2') !!}
@endif

<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		Daftar Kendaraan
		<button type="button" data-toggle="modal" data-target="#kendaraan-modal" class="btn btn-primary pull-right"><i class="pe-7s-plus"></i> Tambah Kendaraan</button>
	</div>
	<div class="cs-card-content card-items-list clearfix">
		<div class="row">
			<div id="kendaraan"></div>
		</div>
	</div>
</div>

@include('modal.kendaraan')

{{ csrf_field() }}

<script>
	loadKendaraanByUser();

	function loadKendaraanByUser() {
		$.get('/get/kendaraan-by-user', function (data) {
			$("#kendaraan").html(data);
		})
	}

	function konfirmasi(nama, id) {
		swal({
			title: "Apakah anda yakin?",
			text: "Data " + nama + " akan dihapus!",
			icon: "warning",
			buttons: ["Batal", "Hapus"],
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: "/kendaraan/"+id,
					type: "post",
					data: {_method: 'delete', id: id, _token: $("input[name='_token']").val()},
					success: function (response) {
						if (response == 1) {
							swal("Wooww!", "Data anda berhasil dihapus", "success");
							loadKendaraanByUser();
						} else {
							swal("Ooops", "Data gagal terhapus!", "error");
						}
					}
				});
			} else {
				swal("Data anda tidak terhapus");
			}
		});
	}

	$(document).ready(function () {
		$('body').on('click', '#edit', function (event) {
			event.preventDefault();
			var id = $(this).data('id');

			$.get('kendaraan/' + id + '/edit', function (data) {
				$('#edit_nama').val(data.data.nama_kendaraan);
				$('#edit_harga').val(data.data.harga);
				$('#edit_jumlah').val(data.data.jumlah);
				$('#edit_keterangan').val(data.data.keterangan);
				$('#gambar_sebelumnya').val(data.data.gambar);
				$('#img').attr('src', "/storage/" + data.data.gambar);
				$('#edit_kendaraan_form').attr('action', '/kendaraan/'+id);
			})
		});

	});
</script>

@endsection()