<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label" for="name"> Name </label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Name" value="{{ $edit->name }}" autocomplete="off" readonly>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label" for="email"> Email </label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{ $edit->email }}" autocomplete="off" readonly>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label" for="password"> Password Baru </label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru" autocomplete="off">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label" for="confim_password"> Konfirmasi Password </label>
			<input type="password" class="form-control" id="confim_password" name="confim_password" placeholder="Masukkan Konfirmasi Password" autocomplete="off">
		</div>
	</div>
</div>