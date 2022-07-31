@extends("content.layouts")

@section("page_content")

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Detail Data Masakan
			</div>
			<div class="panel-body">
				<form>
					<div class="form-group">
						<label class="control-label"> Nama Masakan </label>
						<input type="text" class="form-control" value="{{ $detail->nama_masakan }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label class="control-label"> Harga </label>
						<input type="number" class="form-control" value="{{ $detail->harga }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label class="control-label"> Stok </label>
						<input type="text" class="form-control" value="{{ $detail->stok_masakan }}" readonly style="background-color: white;">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				Input Data Pesanan
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/simpan_data_pesanan_makan') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id_masakan" value="{{ $detail->id }}">
					<div class="form-group">
						<label class="control-label"> QTY </label>
						<input type="number" class="form-control" name="qty" placeholder="0" min="1">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-plus"></i> Tambah </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection