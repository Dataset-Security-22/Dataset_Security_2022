@extends("content.layouts")

@section("page_content")

<div class="col-md-4">
	<div class="panel panel-yellow">
		<div class="panel-heading">
			Update Data Kategori
		</div>
		<div class="panel-body pan">
			<form action="{{ url('/update_kategori') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $edit->id }}">
				<div class="form-body pal">
					<div class="form-group">
						<label> Nama Kategori </label>
						<input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori" value="{{ $edit->nama_kategori }}">
					</div>
				</div>
				<div class="form-actions text-right pal">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="fa fa-fw fa-save"></i> Simpan 
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="panel panel-yellow">
		<div class="panel-heading">
			Data Kategori
		</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th>Nama Kategori</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_kategori as $kategori)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td>{{ $kategori->nama_kategori }}</td>
							<td class="text-center">
								<a href="{{ url('/edit_kategori/'.$kategori->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i> Update </a>
								<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/delete_kategori/'.$kategori->id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i> Delete </a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection