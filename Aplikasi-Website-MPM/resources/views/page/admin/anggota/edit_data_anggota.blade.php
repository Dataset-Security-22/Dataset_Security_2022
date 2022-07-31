<div class="form-group">
	<label for="nim"> NIM </label>
	<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="{{ $edit->nim }}" readonly>
</div>
<div class="form-group">
	<label for="nama"> Nama </label>
	<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $edit->nama }}">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="jenis_kelamin"> Jenis Kelamin </label>
			<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
				<option value="">- Pilih -</option>
				@if($edit->jenis_kelamin == "L")
				<option value="L" selected>Laki - Laki</option>
				<option value="P">Perempuan</option>
				@elseif($edit->jenis_kelamin == "P")
				<option value="L">Laki - Laki</option>
				<option value="P" selected>Perempuan</option>
				@else
				<option value="L">Laki - Laki</option>
				<option value="P">Perempuan</option>
				@endif
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="agama"> Agama </label>
			<select class="form-control" id="agama" name="agama">
				<option value="">- Pilih -</option>
				@if($edit->agama == "islam")
				<option value="islam" selected> Islam </option>
				<option value="kristen"> Kristen </option>
				<option value="hindu"> Hindu </option>
				<option value="buddha"> Buddha </option>
				<option value="konghucu"> Konghucu </option>
				@elseif($edit->agama == "kristen")
				<option value="islam"> Islam </option>
				<option value="kristen" selected> Kristen </option>
				<option value="hindu"> Hindu </option>
				<option value="buddha"> Buddha </option>
				<option value="konghucu"> Konghucu </option>
				@elseif($edit->agama == "hindu")
				<option value="islam"> Islam </option>
				<option value="kristen"> Kristen </option>
				<option value="hindu" selected> Hindu </option>
				<option value="buddha"> Buddha </option>
				<option value="konghucu"> Konghucu </option>
				@elseif($edit->agama == "buddha")
				<option value="islam"> Islam </option>
				<option value="kristen"> Kristen </option>
				<option value="hindu" selected> Hindu </option>
				<option value="buddha"> Buddha </option>
				<option value="konghucu"> Konghucu </option>
				@elseif($edit->agama == "konghucu")
				<option value="islam"> Islam </option>
				<option value="kristen"> Kristen </option>
				<option value="hindu"> Hindu </option>
				<option value="buddha"> Buddha </option>
				<option value="konghucu" selected> Konghucu </option>
				@else
				<option value="islam"> Islam </option>
				<option value="kristen"> Kristen </option>
				<option value="hindu"> Hindu </option>
				<option value="buddha"> Buddha </option>
				<option value="konghucu"> Konghucu </option>
				@endif
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="no_hp"> No. HP </label>
			<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="0" value="{{ $edit->no_hp }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="id_kelas"> Kelas </label>
			<select class="form-control" id="id_kelas" name="id_kelas">
				<option value="">- Pilih -</option>
				@foreach($data_kelas as $kelas)
					@if($edit->id_kelas == $kelas->id_kelas)
					<option value="{{ $kelas->id_kelas }}" selected>
						{{ $kelas->nama_kelas }}
					</option>
					@else
					<option value="{{ $kelas->id_kelas }}">
						{{ $kelas->nama_kelas }}
					</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="form-group">
	<label for="alamat"> Alamat </label>
	<textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Masukkan Alamat">{{ $edit->alamat }}</textarea>
</div>