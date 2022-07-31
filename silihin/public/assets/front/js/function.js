$(document).ready(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
		}
	});

	$('body').on('click', '#detail', function (event) {
		event.preventDefault();
		let id = $(this).data('id');

		$.get('get/kendaraan-by-'+id, function (data) {

			$('#title').html("[ "+ data.data.user.nama_lengkap +" ] " + data.data.nama_kendaraan);
			$('#detailKeterangan').html(data.data.keterangan);
			$('#img').attr('src', "/storage/" + data.data.gambar);
		})
	});
})

loadKendaraan();

function search_item() {
	let value = $("#search-inp").val().trim();

	$.ajax({
		url:'/get/kendaraan-by',
		type:'POST',
		data: {term: value},
		success: function(response){

			$("#getKendaraan").empty();	
			$("#getKendaraan").html(response);

		}
	});
}

function loadKendaraan() {
	$.get('/get/kendaraan-all', function (data) {
		$("#getKendaraan").html(data);
	})
}