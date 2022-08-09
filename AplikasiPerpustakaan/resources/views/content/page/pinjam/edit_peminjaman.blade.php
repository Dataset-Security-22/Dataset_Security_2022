<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Nama Anggota </label>
			<select class="form-control" name="id_anggota">
				<option value="">- Pilih -</option>
				@foreach($data_anggota as $anggota)
				@if($edit->id_anggota == $anggota->id)
				<option value="{{ $anggota->id }}" selected>
					{{ $anggota->nama }}
				</option>
				@else
				<option value="{{ $anggota->id }}">
					{{ $anggota->nama }}
				</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Kode Buku </label>
			<select class="form-control" name="kode_buku">
				<option value="">- Pilih -</option>
				@foreach($data_buku as $buku)
				<?php
				$pinjam = DB::table("pinjam")
				->where("kode_buku", $buku->kode)
				->count();

				$total_stok = $buku->stok_buku - $pinjam;
				?>

				@if($edit->kode_buku == $buku->kode)
				<option value="{{ $buku->kode }}" selected>
					{{ $buku->kode }} - {{ $buku->judul }}
				</option>
				@else
				@if($total_stok > 0)
				<option value="{{ $buku->kode }}">
					{{ $buku->kode }} - {{ $buku->judul }}
				</option>
				@endif
				@endif

				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Tanggal Pinjam </label>
			<?php
			$tanggal = date("Y-m-d");
			?>
			<input type="date" class="form-control" name="tgl_pinjam" value="{{ $edit->tgl_pinjam }}" readonly style="background-color: white;">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label"> Tanggal Kembali </label>
			<input type="date" class="form-control" name="tgl_kembali" value="{{ $edit->tgl_kembali }}">
		</div>
	</div>
</div>
