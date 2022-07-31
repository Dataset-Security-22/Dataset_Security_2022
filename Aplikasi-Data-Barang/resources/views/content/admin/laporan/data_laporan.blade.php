@extends("content.layouts.app")

@section("page_header", "Data Laporan")

@section("page_content")

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Data Laporan </h6>
	</div>
	<div class="card-body">
		<form>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="tanggal_sekarang"> Tanggal </label>
						<input type="date" class="form-control" id="tanggal_sekarang" name="tanggal_sekarang">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="tanggal_selesai"> Tanggal Akhir </label>
						<input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-fw fa-search"></i> Cari Data Laporan </button>
			</div>
		</form>
	</div>
</div>

@endsection