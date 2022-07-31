<div class="form-group">
	<label for="id_penggunaan">ID Penggunaan</label>
	<input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" value="{{ $edit->id_penggunaan }}" readonly>
</div>
<div class="form-group">
	<label for="id_pelanggan">Nama Pelanggan</label>
	<select class="form-control" name="id_pelanggan">
		<option value="">- Pilih -</option>
		@foreach($data_pelanggan as $pelanggan)
		<?php
			$data = DB::table("penggunaan")
			->where("id_pelanggan", $pelanggan->id_pelanggan)
			->where("bulan", date("m"))
			->where("tahun", date("Y"))
			->first();
		?>

		@if($edit->id_pelanggan == $pelanggan->id_pelanggan)
			<option value="{{ $pelanggan->id_pelanggan }}" selected=>
				{{ $pelanggan->nama }}
			</option>
		@else
			@if(!$data)
			<option value="{{ $pelanggan->id_pelanggan }}">
				{{ $pelanggan->nama }}
			</option>
			@endif
		@endif
		@endforeach
	</select>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Bulan </label>
			<input type="text" class="form-control" name="bulan" value="{{ $edit->bulan }}" readonly>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Tahun </label>
			<input type="text" class="form-control" name="tahun" value="{{ $edit->tahun }}" readonly>
		</div>							
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Meter Awal </label>
			<input type="number" class="form-control" name="meter_awal" placeholder="0" value="{{ $edit->meter_awal }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Meter Akhir </label>
			<input type="number" class="form-control" name="meter_akhir" placeholder="0" value="{{ $edit->meter_akhir }}">
		</div>
	</div>
</div>
<div class="form-group">
	<label> Tanggal Cek </label>
	<input type="date" class="form-control" name="tgl_cek" value="{{ $edit->tgl_cek }}" readonly>
</div>