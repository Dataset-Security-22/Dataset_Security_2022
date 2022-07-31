<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> ID Sopir </label>
			<input type="text" class="form-control" name="id_sopir" placeholder="Masukkan ID Sopir" value="{{ $edit->id_sopir }}" readonly>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Tarif Per/Jam </label>
			<input type="text" class="form-control" name="tarif_perjam" placeholder="Tarif Per/Jam" value="{{ $edit->tarif_perjam }}">
		</div>
	</div>
</div>

<div class="form-group">
	<label> Nama Sopir </label>
	<input type="text" class="form-control" name="nama_sopir" placeholder="Masukkan Nama Sopir" value="{{ $edit->nama_sopir }}">
</div>
<div class="form-group">
	<label> Alamat Sopir </label>
	<textarea class="form-control" name="alamat_sopir" rows="5" placeholder="Masukkan Alamat Sopir">{{ $edit->alamat_sopir }}</textarea>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Telepon Sopir </label>
			<input type="text" class="form-control" name="telp_sopir" placeholder="Masukkan No. Telepon Sopir" value="{{ $edit->telp_sopir }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> No. SIM </label>
			<input type="text" class="form-control" name="no_sim" placeholder="Masukkan No. SIM" value="{{ $edit->no_sim }}">
		</div>
	</div>
</div>