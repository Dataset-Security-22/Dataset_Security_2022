<input type="hidden" name="id_absensi" value="{{ $edit->id_absensi }}">
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Nama Anggota </label>
			<select class="form-control select3bs4" name="nim_anggota" style="width: 100%;" required>
				<option selected="selected"> - Pilih - </option>
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
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Status Absen </label>
			<select class="form-control" name="status_absen" required>
				@if($edit->status_absen == 1)
				<option value="">- Pilih -</option>
				<option value="1" selected>Hadir</option>
				<option value="2">Sakit</option>
				<option value="3">Izin</option>
				<option value="4">Alfa</option>
				@elseif($edit->status_absen == 2)
				<option value="">- Pilih -</option>
				<option value="1">Hadir</option>
				<option value="2" selected>Sakit</option>
				<option value="3">Izin</option>
				<option value="4">Alfa</option>
				@elseif($edit->status_absen == 3)
				<option value="">- Pilih -</option>
				<option value="1">Hadir</option>
				<option value="2">Sakit</option>
				<option value="3" selected>Izin</option>
				<option value="4">Alfa</option>
				@elseif($edit->status_absen == 4)
				<option value="">- Pilih -</option>
				<option value="1">Hadir</option>
				<option value="2">Sakit</option>
				<option value="3">Izin</option>
				<option value="4" selected>Alfa</option>
				@else
				<option value="">- Pilih -</option>
				<option value="1">Hadir</option>
				<option value="2">Sakit</option>
				<option value="3">Izin</option>
				<option value="4">Alfa</option>
				@endif
			</select>
		</div>
	</div>
</div>
<div class="form-group">
	<label> Tanggal Absen </label>
	<input type="date" class="form-control" name="tanggal_absen" value="{{ $edit->tanggal_absen }}" required>
</div>
<div class="form-group">
	<label> Keterangan </label>
	<textarea class="form-control" name="keterangan" placeholder="Masukkan Keterangan" rows="4">{{ $edit->keterangan }}</textarea>
</div>