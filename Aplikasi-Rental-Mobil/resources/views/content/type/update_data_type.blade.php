<input type="hidden" name="id_type" value="{{ $edit->id_type }}">
<div class="form-group">
	<label> Kode Type </label>
	<input type="text" class="form-control" name="kode_type" value="{{ $edit->kode_type }}" readonly style="background-color: white;">
</div>
<div class="form-group">
	<label> Nama Type </label>
	<input type="text" class="form-control" name="nama_type" value="{{ $edit->nama_type }}">
</div>
<div class="form-group">
	<label> Nama Merk </label>
	<select class="form-control" name="kode_merk">
		<option value="">- Pilih Merk -</option>
		@foreach($data_merk as $merk)
			@if($edit->kode_merk == $merk->kode_merk)
			<option value="{{ $merk->kode_merk }}" selected>
				{{ $merk->nama_merk }}
			</option>
			@else
			<option value="{{ $merk->kode_merk }}">
				{{ $merk->nama_merk }}
			</option>
			@endif
		@endforeach
	</select>
</div>