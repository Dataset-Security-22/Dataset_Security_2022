<form method="POST" action="{{ url('/admin/update_lapangan') }}">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $edit->id }}">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="land_id"> Nama Tanah </label>
				<select class="form-control" id="land_id" name="land_id">
					<option value="">- Pilih -</option>
					@foreach($data_lands as $lands)
						@if($edit->land_id == $lands->id)
							<option value="{{ $lands->id }}" selected>{{ $lands->name }}</option>
						@else
							<option value="{{ $lands->id }}">{{ $lands->name }}</option>
						@endif
					
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="name"> Nama Lapangan </label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Nama Lapangan" value="{{ $edit->name }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="length"> Panjang Lapangan </label>
				<input type="text" class="form-control" id="length" name="length" placeholder="Panjang" value="{{ $edit->length }}">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="width"> Ukuran Lapangan </label>
				<input type="text" class="form-control" id="width" name="width" placeholder="Ukuran" value="{{ $edit->width }}">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="condition"> Kondisi </label>
				<select class="form-control" id="condition" name="condition">
					<option value="">- Pilih -</option>
					<option value="1" <?php if($edit->condition==1) {
						echo "selected";
						} ?>>Baik</option>
					<option value="2" <?php if($edit->condition==2) {
						echo "selected";
						} ?>>Rusak</option>
					<option value="3" <?php if($edit->condition==3) {
						echo "selected";
						} ?>>Lecet</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="details"> Detail </label>
				<textarea class="form-control" id="details" name="details" placeholder="Detail">{{ $edit->details }}</textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-fw fa-save"></i> Simpan </button>
			</div>
		</div>
	</div>
</form>