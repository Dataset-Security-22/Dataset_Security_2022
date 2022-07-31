<input type="hidden" class="form-control" name="id" value="{{ $edit->id }}">
<div class="form-group">
	<label> No Plat </label>
	<input type="text" class="form-control" name="no_plat" placeholder="Masukkan No Plat" value="{{ $edit->no_plat }}">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Tahun </label>
			<input type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun" value="{{ $edit->tahun }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Tarif Per/Jam </label>
			<input type="text" class="form-control" name="tarif_perjam" placeholder="Masukkan Tarif Per/Jam" value="{{ $edit->tarif_perjam }}">
		</div>
	</div>
</div>
<div class="form-group">
	<label> Nama Pemilik </label>
	<select class="form-control" name="kode_pemilik">
		<option value="">- Pilih Nama Pemilik -</option>
		@foreach($data_pemilik as $pemilik)
			@if($edit->kode_pemilik == $pemilik->kode_pemilik)
			<option value="{{ $pemilik->kode_pemilik }}" selected>
				{{ $pemilik->nama_pemilik }}
			</option>
			@else
			<option value="{{ $pemilik->kode_pemilik }}">
				{{ $pemilik->nama_pemilik }}
			</option>
			@endif
		@endforeach
	</select>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label> Image </label>
			<img src="{{ url('/public/images/'.$edit->image) }}" width="100%">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Ganti Gambar </label>
			<input type="file" class="form-control" name="image">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Merk </label>
			<select class="form-control" name="kode_type">
				<option value="">- Pilih -</option>
				@foreach($data_type as $type)
					@if($edit->kode_type == $type->kode_type)
					<option value="{{ $type->kode_type }}" selected>
						{{ $type->kode_type }} - {{ $type->nama_type }}
					</option>
					@else
					<option value="{{ $type->kode_type }}">
						{{ $type->kode_type }} - {{ $type->nama_type }}
					</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>