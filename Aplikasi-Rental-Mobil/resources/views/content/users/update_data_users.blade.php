<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
	<label> Username </label>
	<input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="{{ $edit->username }}">
</div>
<div class="form-group">
	<label> Password Baru </label>
	<input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru">
</div>
<div class="form-group">
	<label> Konfirmasi Password </label>
	<input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Password">
</div>