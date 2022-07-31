@extends("content.layouts")

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Update Pemesanan
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/simpan_edit') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{$edit->id}}">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal"> Tanggal </label>
								<input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $edit->tanggal }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu"> Waktu </label>
								<input type="text" class="form-control" id="waktu" name="waktu" placeholder="waktu" value="{{ $edit->waktu }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_menu"> Nama Menu </label>
								<input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="nama menu" value="{{ $edit->nama_menu }}">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone"> Phone </label>
								<input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{ $edit->phone }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="status"> Status </label>
								<input type="text" class="form-control" id="status" name="status" placeholder="status" value="{{ $edit->status }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="alamat"> Alamat </label>
								<textarea  class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?php echo "$edit->alamat" ?></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa fa-plus"></i> Tambah </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="table table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Waktu</th>
						<th class="text-center">nama menu</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Phone</th>
						<th class="text-center">Status</th>
						<th class="text-center">Aksi</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_masakan as $menu)
					<tr>
					<td class="text-center">{{ ++$no }}.</td>
						<td class="text-center">{{ $menu->tanggal }}</td>
						<td class="text-center">{{ $menu->waktu }}</td>
						<td class="text-center">{{ $menu->nama_menu }}</td>
						<td class="text-center">{{ $menu->alamat }}</td>
						<td class="text-center">{{ $menu->phone }}</td>
						<td class="text-center">{{ $menu->status }}</td>
						<td class="text-center">
							<a href="{{ url('/menu-/'.$menu->id.'/edit_menu') }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Update </a>
							<a href="{{ url('/menu-/'.$menu->id.'/delete_menu') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection