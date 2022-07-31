<input type="hidden" name="id_setoran" value="{{ $edit->id_setoran }}"><div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> No. Setoran </label>
			<input type="number" class="form-control" name="no_setoran" placeholder="0" value="{{ $edit->no_setoran }}" readonly style="background-color: white;">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Tanggal Setoran </label>
			<input type="date" class="form-control" name="tgl_setoran" value="{{ date('Y-m-d') }}" readonly style="background-color: white;">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label> Jumlah </label>
			<input type="number" class="form-control" name="jumlah" placeholder="0" min="1000" max="20000" value="{{ $edit->jumlah }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label> Nama Sopir </label>
			<select class="form-control" name="id_sopir">
				<option value="" disabled>- Pilih -</option>
				@foreach($data_sopir as $sopir)
					@if($edit->id_sopir == $sopir->id_sopir)
					<option value="{{ $sopir->id_sopir }}">
						{{ $sopir->nama_sopir }}
					</option>
					@else
						@if($sopir->re_transaksi != NULL)
						<option value="{{ $sopir->id_sopir }}">
							{{ $sopir->nama_sopir }}
						</option>
						@endif
					@endif
				@endforeach
			</select>
		</div>
	</div>
	</div>