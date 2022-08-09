<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="nik_petugas"> NIK Petugas </label>
			<input type="text" class="form-control" id="nik_petugas" name="nik_petugas" placeholder="Masukkan NIK" autocomplete="off" value="{{ $edit->nik_petugas }}" readonly>
		</div>	
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off" value="{{ $edit->nama }}">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label for="no_telepon">No. Telepon</label>
			<input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan No. Telepon" autocomplete="off" value="{{ $edit->no_telepon }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="jk">Jenis Kelamin</label>
			<select class="form-control" id="jk" name="jk">
				@if($edit->jk == "L")
				<option value="" disabled>- Pilih -</option>
				<option value="L" selected>Laki - Laki</option>
				<option value="P">Perempuan</option>
				@elseif($edit->jk == "P")
				<option value="" disabled>- Pilih -</option>
				<option value="L">Laki - Laki</option>
				<option value="P" selected>Perempuan</option>
				@else
				<option value="" disabled selected>- Pilih -</option>
				<option value="L">Laki - Laki</option>
				<option value="P">Perempuan</option>
				@endif
			</select>
		</div>
	</div>
</div>
<div class="form-group">
	<label for="alamat">Alamat</label>
	<textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Masukkan Alamat">{{ $edit->alamat }}</textarea>
</div>