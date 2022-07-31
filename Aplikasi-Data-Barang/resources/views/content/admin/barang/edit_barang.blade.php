<form method="POST" action="{{ url('/admin/update_barang') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $edit->id }}">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="category_id"> Nama Kategori </label>
				<select class="form-control" id="category_id" name="category_id">
					<option value="">- Pilih -</option>
					@foreach($data_kategori as $kategori)
						@if($edit->category_id == $kategori->id)
							<option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
						@else
							<option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="name"> Nama Barang </label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Nama Barang" value="{{ $edit->name }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="details"> Detail Barang </label>
				<textarea class="form-control" id="details" name="details" placeholder="Detail Barang">{{ $edit->details }}</textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="image"> Image </label> <br>
				<img src="{{ url('/public/goods/'.$edit->image) }}" width="100">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="ganti_gambar"> Ganti Gambar </label>
				<input type="file" class="form-control" id="ganti_gambar" name="image">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<button type="submit" class="btn btn-warning btn-sm btn-block"><i class="fas fa-fw fa-eraser"></i> Update </button>
			</div>
		</div>
	</div>
</form>