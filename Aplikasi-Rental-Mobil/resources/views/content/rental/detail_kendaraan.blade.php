@extends("content.layouts.app")

@section("page_content")

<div class="row mt">
	<div class="col-md-8">
		<div class="form-panel">
			<h4 class="mb"><i class="fa fa-taxi"></i> Data Kendaraan </h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label> No. Plat Kendaraan</label>
						<input type="text" class="form-control" value="{{ $detail->no_plat }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Tahun </label>
						<input type="text" class="form-control" value="{{ $detail->tahun }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Tarif Perjam </label>
						<input type="text" class="form-control" value="{{ $detail->tarif_perjam }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Status Rental </label>
						<input type="text" class="form-control" value="{{ $detail->status_rental }}" readonly style="background-color: white;">
					</div>
				</div>
				<div class="col-md-6">
					<br>
					<img src="{{ url('/public/images/'.$detail->image) }}" width="100%">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-panel">
			<h4 class="mb"><i class="fa fa-bar-chart-o"></i> Data Merk </h4>
			<div class="form-group">
				<label> Kode Merk </label>
				<input type="text" class="form-control" value="{{ $detail->re_type->re_merk->kode_merk }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Nama Merk </label>
				<input type="text" class="form-control" value="{{ $detail->re_type->re_merk->nama_merk }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Kode Type </label>
				<input type="text" class="form-control" value="{{ $detail->re_type->kode_type }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Type Mobil </label>
				<input type="text" class="form-control" value="{{ $detail->re_type->nama_type }}" readonly style="background-color: white;">
			</div>
		</div>
	</div>    	
</div><!-- /row -->

<div class="row mt">
	<div class="col-md-4" style="margin-left: 10px;">
		<a href="{{ url('/dashboard') }}" class="btn btn-danger btn-sm"><i class="fa fa-refresh fa-fw"></i> Kembali </a>		
		<a href="{{ url('/detail_kendaraan/'.$detail->id.'/detail/create_transaksi') }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Rental </a>
	</div>
</div>

@endsection