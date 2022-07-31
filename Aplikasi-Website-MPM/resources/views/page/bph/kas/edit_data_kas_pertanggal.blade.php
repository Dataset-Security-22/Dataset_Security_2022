<input type="hidden" name="id_kas" value="{{ $edit->id_kas }}">
<div class="form-group">
	<label for="nim_anggota"> Nama Anggota </label>
	<select class="form-control" id="nim_anggota" name="nim_anggota">
		<option value="">- Pilih -</option>
		@foreach($data_divisi as $divisi)
			@if($edit->nim_anggota == $divisi->getAnggota->nim)
			<option value="{{ $divisi->getAnggota->nim }}" selected>
				{{ $divisi->getAnggota->nama }}
			</option>
			@else
			<option value="{{ $divisi->getAnggota->nim }}">
				{{ $divisi->getAnggota->nama }}
			</option>
			@endif
		@endforeach
	</select>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="bayar"> Bayar </label>
			<input type="number" class="form-control" id="bayar" name="bayar" placeholder="0" value="{{ $edit->bayar }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="tanggal"> Tanggal </label>
			<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="0" value="{{ $edit->tanggal }}">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="keterangan"> Keterangan </label>
	<textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan">{{ $edit->keterangan }}</textarea>
</div>