<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label"> Kode Buku </label>
			<input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Buku" value="{{ $edit->kode }}" readonly>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label"> Rak </label>
			<select class="form-control" name="id_rak">
				<option value="">- Pilih -</option>
				@foreach($data_rak as $rak)
				@if($edit->id_rak == $rak->id)
				<option value="{{ $rak->id }}" selected>
					{{ $rak->nama_rak }}
				</option>
				@else
				<option value="{{ $rak->id }}">
					{{ $rak->nama_rak }}
				</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label"> Kategori </label>
			<select class="form-control" name="id_kategori">
				<option value="">- Pilih -</option>
				@foreach($data_kategori as $kategori)
				@if($edit->id_kategori == $kategori->id)
				<option value="{{ $kategori->id }}" selected>
					{{ $kategori->nama_kategori }}
				</option>
				@else
				<option value="{{ $kategori->id }}">
					{{ $kategori->nama_kategori }}
				</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label"> Judul Buku </label>
	<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" value="{{ $edit->judul }}" autocomplete="off">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Penerbit </label>
			<input type="text" class="form-control" name="penerbit" placeholder="Masukkan Nama Penerbit" value="{{ $edit->penerbit }}" autocomplete="off">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Pengarang </label>
			<input type="text" class="form-control" name="pengarang" placeholder="Masukkan Nama Pengarang" value="{{ $edit->pengarang }}" autocomplete="off">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Tahun </label>
			<input type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun" value="{{ $edit->tahun }}" autocomplete="off">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Stok Buku </label>
			<?php
				$date = date("Y-m-d");
				$kembali = DB::table("pinjam")
					->where("tgl_mengembalikan",NULL)
					->where("kode_buku", $edit->kode)
					->count();

					$total = $edit->stok_buku - $kembali;
			?>
			<input type="number" class="form-control" name="stok_buku" placeholder="Masukkan Jumlah" value="{{ $total }}" autocomplete="off">
		</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label"> Image </label>
	<br>
	<img src="{{ url('/public/picture/'.$edit->img) }}" width="100%" height="300">
</div>
<div class="form-group">
	<input type="file" class="form-control" name="img">
</div>