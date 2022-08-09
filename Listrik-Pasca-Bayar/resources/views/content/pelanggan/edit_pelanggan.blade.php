<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="id_pelanggan">ID Pelanggan</label>
			<input type="text" class="form-control" name="id_pelanggan" value="{{ $edit->id_pelanggan }}" autocomplete="off" readonly>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="no_meter">No. Meter</label>
			<input type="text" class="form-control" id="no_meter" name="no_meter" autocomplete="off" placeholder="Masukkan No. Meter" value="{{ $edit->no_meter }}">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="nama_pelanggan">Nama Pelanggan</label>
			<input type="text" class="form-control" id="nama_pelanggan" name="nama" autocomplete="off" placeholder="Masukkan Nama Pelanggan" value="{{ $edit->nama }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="id_tarif">Tarif</label>
			<select class="form-control" id="id_tarif" name="id_tarif">
				<option value="" disabled>- Pilih -</option>
				@foreach($data_tarif as $tarif)
					@if($edit->id_tarif == $tarif->id)
					<option value="{{ $tarif->id }}" selected>
						{{ $tarif->golongan }} - {{ $tarif->daya }}
					</option>
					@else
					<option value="{{ $tarif->id }}">
						{{ $tarif->golongan }} - {{ $tarif->daya }}
					</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="form-group">
	<label for="alamat">Alamat</label>
	<textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Pelanggan" rows="5">{{ $edit->alamat }}</textarea>
</div>
