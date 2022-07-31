<div class="form-group">
	<label for="username"> Username </label>
	<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="{{ $edit->username }}">
</div>
<div class="form-group">
	<label for="nama"> Nama </label>
	<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $edit->nama }}">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="email"> Email </label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan E-Mail" value="{{ $edit->email }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="password"> Password </label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="id_role"> Role </label>
	<select class="form-control" id="id_role" name="id_role">
		<option value="">- Pilih -</option>
		@foreach($data_role as $role)
			@if($edit->id_role == $role->id_role)
			<option value="{{ $role->id_role }}" selected>
				{{ $role->nama_role }}
			</option>
			@else
			<option value="{{ $role->id_role }}">
				{{ $role->nama_role }}
			</option>
			@endif
		@endforeach
	</select>
</div>