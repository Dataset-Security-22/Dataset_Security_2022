@extends("page.layouts.template")

@section("page_title", "Laporan Data Kas")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0"> Laporan Data KAS </h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active"> Laporan Data KAS </li>
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
						Data KAS
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-hover table-bordered">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">NIM</th>
								<th>Nama</th>
								<th class="text-center"></th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_divisi as $divisi)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $divisi->getAnggota->nim }}</td>
								<td>{{ $divisi->getAnggota->nama }}</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/laporan/data_kas') }}/{{ $divisi->id_divisi }}/detail" class="btn btn-success btn-sm">
										<i class="fa fa-search"></i> Detail
									</a>
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