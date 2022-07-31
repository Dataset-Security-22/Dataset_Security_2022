<input type="hidden" name="id_service" value="{{ $edit->id_service }}">
<div class="form-group">
	<label> Kode Service </label>
	<input type="text" class="form-control" name="kode_service" placeholder="Masukkan Kode Service" value="{{ $edit->kode_service }}">
</div>
<div class="form-group">
	<label> Tanggal Service </label>
	<input type="date" class="form-control" name="tgl_service" value="{{ $edit->tgl_service }}" readonly>
</div>
<div class="form-group">
	<label> Biaya Service </label>
	<input type="number" class="form-control" name="biaya_service" placeholder="0" value="{{ $edit->biaya_service }}">
</div>
<div class="form-group">
	<div class="form-group">
		<label> Nama Jenis Service </label>
		<select class="form-control" name="id_jenis_service">
			<option value="">- Pilih -</option>
			@foreach($data_jenis_service as $jenis_service)
				@if($edit->id_jenis_service == $jenis_service->id_jenis_service)
				<option value="{{ $jenis_service->id_jenis_service }}" selected>
					{{ $jenis_service->nama_jenis_service }}
				</option>
				@else
				<option value="{{ $jenis_service->id_jenis_service }}">
					{{ $jenis_service->nama_jenis_service }}
				</option>
				@endif
			@endforeach
		</select>
	</div>
</div>