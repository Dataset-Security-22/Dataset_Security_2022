<input type="hidden" name="nik_lama" value="{{ $edit->nik }}">
<div class="form-group">
	<label> NIK Karyawan </label>
	<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Karyawan" value="{{ $edit->nik }}" readonly>
</div>
<div class="form-group">
	<label> Nama Karyawan </label>
	<input type="text" class="form-control" name="nama_kar" placeholder="Masukkan Nama Karyawan" value="{{ $edit->nama_kar }}">
</div>
<div class="form-group">
	<label> Alamat Karyawan </label>
	<textarea class="form-control" name="alamat_kar" rows="5" placeholder="Masukkan Alamat Karyawan">{{ $edit->alamat_kar }}</textarea>
</div>
<div class="form-group">
	<label> No. Telepon Karyawan </label>
	<input type="text" class="form-control" name="telp_kar" placeholder="Masukkan No. Telepon" value="{{ $edit->telp_kar }}">
</div>