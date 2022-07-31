@extends("content.layouts")

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Detail Data Masakan
			</div>
			<div class="panel-body">
				<div class="table table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Masakan</th>
								<th class="text-center">Harga </th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_pesan as $pesan)
								<tr>
									<td class="text-center">{{ ++$no }}.</td>
									<td>{{ $pesan->get_masakan->nama_masakan }}</td>
									<td class="text-center">Rp. {{ number_format($pesan->harga) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Pemesan
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/simpan_data_pemesan') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label"> Nama Pembeli </label>
						<input type="text" class="form-control" name="nama_pembeli" placeholder="Masukkan Nama Pembeli">
					</div>
					<div class="form-group">
						<label class="control-label"> No. Telepon </label>
						<input type="text" class="form-control" name="no_hp" placeholder="Masukkan No. Telepon">
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