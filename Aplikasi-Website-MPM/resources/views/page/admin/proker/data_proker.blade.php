@extends("page.layouts.template")

@section("page_title", "Data Proker")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Proker</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">Data Proker</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Data Role
					</h3>
					<a href="{{ url('/page/admin/proker/form_tambah') }}" class="btn btn-primary btn-sm pull-right">
						<i class="fa fa-plus"></i> Tambah Data
					</a>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Proker</th>
								<th class="text-center">Waktu</th>
								<th class="text-center">Target</th>
								<th class="text-center">Sasaran</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_proker as $proker)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $proker->nama_proker }}</td>
								<td class="text-center">{{ $proker->waktu }}</td>
								<td class="text-center">{{ $proker->target }}</td>
								<td class="text-center">{{ $proker->sasaran }}</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/proker/edit') }}/{{ $proker->id_proker }}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<form method="POST" action="{{ url('/page/admin/hapus') }}" class="d-inline">
										{{ csrf_field() }}
										<input type="hidden" name="id_proker" value="{{ $proker->id_proker }}">
										<button type="submit" class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection