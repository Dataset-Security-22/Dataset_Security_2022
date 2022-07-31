<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> No. KTP </label>
			<input type="text" class="form-control" name="no_ktp" placeholder="Masukkan No. KTP" value="{{ $edit->no_ktp }}" readonly style="background-color: white;">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Telepon Pelanggan </label>
			<input type="text" class="form-control" name="telp_pel" placeholder="Masukkan No. Telepon" value="{{ $edit->telp_pel }}">
		</div>
	</div>
</div>
<div class="form-group">
	<label> Nama </label>
	<input type="text" class="form-control" name="nama_pel" placeholder="Masukkan Nama Pelanggan" value="{{ $edit->nama_pel }}">
</div>
<div class="form-group">
	<label> Alamat </label>
	<textarea class="form-control" name="alamat_pel" rows="4" placeholder="Masukkan Alamat Pelanggan">{{ $edit->alamat_pel }}</textarea>
</div>