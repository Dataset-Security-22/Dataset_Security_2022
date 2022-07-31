<input type="hidden" name="id_pemilik" value="{{ $edit->id_pemilik }}">
<div class="form-group">
	<label> Kode Pemilik </label>
	<input type="text" class="form-control" name="kode_pemilik" placeholder="Masukkan Kode Pemilik" value="{{ $edit->kode_pemilik }}" readonly style="background-color: white;">
</div>
<div class="form-group">
	<label> Nama Pemilik </label>
	<input type="text" class="form-control" name="nama_pemilik" placeholder="Masukkan Nama Pemilik" value="{{ $edit->nama_pemilik }}">
</div>
<div class="form-group">
	<label> Alamat Pemilik </label>
	<textarea class="form-control" name="alamat_pemilik" rows="5" placeholder="Masukkan Alamat Pemilik">{{ $edit->alamat_pemilik }}</textarea>
</div>
<div class="form-group">
	<label> Telepon Pemilik </label>
	<input type="text" class="form-control" name="telp_pemilik" placeholder="Masukkan Telepon Pemilik" value="{{ $edit->telp_pemilik }}">
</div>