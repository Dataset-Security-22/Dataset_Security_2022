<form method="POST" action="{{ url('/admin/update_stok') }}">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $edit->id }}">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="good_id"> Nama Barang </label>
				<select class="form-control" id="good_id" name="good_id">
					<option value="">- Pilih -</option>
					@foreach($data_barang as $barang)
						@if($edit->good_id == $barang->id)
							<option value="{{ $barang->id }}" selected>{{ $barang->name }}</option>
						@else
							<option value="{{ $barang->id }}">{{ $barang->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="type"> Tipe </label>
				<select class="form-control" id="type" name="type">
					@if($edit->type == "1")
						<option value="1" selected>- Barang Masuk -</option>
						<option value="0">- Barang Keluar -</option>
					@else
						<option value="1">- Barang Masuk -</option>
						<option value="0" selected>- Barang Keluar -</option>
					@endif
				</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="quantity"> Quantity </label>
		<input type="number" class="form-control" id="quantity" name="quantity" placeholder="0" value="{{ $edit->quantity }}">
	</div>
	<div class="form-group">
		<label for="details"> Detail </label>
		<textarea class="form-control" id="details" name="details" placeholder="Detail">{{ $edit->details }}</textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-warning btn-sm btn-block"><i class="fas fa-fw fa-eraser"></i> Update </button>
	</div>
</form>