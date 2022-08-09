<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label" for="nim"> NIM </label>
			<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="{{ $edit->nim }}" readonly>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label" for="nama"> Nama </label>
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $edit->nama }}" autocomplete="off">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label" for="jenis_kelamin"> Jenis Kelamin </label>
			<select class="form-control" id="jenis_kelamin" name="jenis_kelamin"> 
				@if($edit->jenis_kelamin == "L")
				<option value="" disabled>- Pilih -</option>
				<option value="L" selected>Laki - Laki</option>
				<option value="P">Perempuan</option>
				@elseif($edit->jenis_kelamin == "P")
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
	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label" for="no_hp"> No. HP </label>
			<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. HP" value="{{ $edit->no_hp }}" autocomplete="off">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label" for="prodi"> Prodi </label>
			<select class="form-control" id="prodi" name="id_prodi">
				<option value="" disabled>- Pilih -</option>
				@foreach($data_prodi as $prodi)
					@if($edit->id_prodi == $prodi->id)
					<option value="{{ $prodi->id }}" selected>
						{{ $prodi->nama_prodi }}
					</option>
					@else
					<option value="{{ $prodi->id }}">
						{{ $prodi->nama_prodi }}
					</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>