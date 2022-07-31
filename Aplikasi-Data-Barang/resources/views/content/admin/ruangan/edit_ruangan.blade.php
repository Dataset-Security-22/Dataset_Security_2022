<form method="POST" action="{{ url('/admin/update_ruangan') }}">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $edit->id }}">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="land_id"> Nama Tanah </label>
				<select class="form-control" id="land_id" name="land_id">
					<option value="">- Pilih -</option>
					@foreach($data_tanah as $tanah)
						@if($edit->land_id == $tanah->id)
							<option value="{{ $tanah->id }}" selected>{{ $tanah->name }}</option>
						@else
							<option value="{{ $tanah->id }}">{{ $tanah->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="name"> Nama Ruangan </label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Nama Ruangan" value="{{ $edit->name }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="length"> Panjang Ruangan </label>
				<input type="text" class="form-control" id="length" name="length" placeholder="Panjang Ruangan" value="{{ $edit->length }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="width"> Ukuran Ruangan </label>
				<input type="text" class="form-control" id="width" name="width" placeholder="Ukuran" value="{{ $edit->width }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="height"> Tinggi Ruangan </label>
				<input type="text" class="form-control" id="height" name="height" placeholder="Tinggi" value="{{ $edit->height }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="condition"> Kondisi </label>
				<select class="form-control" id="condition" name="condition">
					<option value="">- Pilih -</option>
					<option value="1" <?php if ($edit->condition==1) {
						echo "selected";
					} ?>>Baik</option>
					<option value="2" <?php if ($edit->condition==2) {
						echo "selected";
					} ?>>Rusak</option>
					<option value="3" <?php if ($edit->condition==3) {
						echo "selected";
					} ?>>Lecet</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="details"> Detail Ruangan </label>
				<textarea class="form-control" id="details" name="details" placeholder="Detail">{{ $edit->details }}</textarea>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-fw fa-save"></i> Simpan </button>
	</div>
</form>