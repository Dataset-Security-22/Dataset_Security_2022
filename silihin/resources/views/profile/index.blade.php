@extends('template/second')

@section('content')

@if (session('message2'))
{!! session('message2') !!}
@endif
<div id="pesan"></div>
<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		Profil
	</div>
	<div class="cs-card-content card-items-list clearfix">
		<form action="/profile" id="profile_form" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="form-group row">
				<label class="col-sm-2">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" readonly value="{{ $user->email }}" id="email">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2">Nama Lengkap</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ $user->nama_lengkap }}">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2">Telepon</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="telepon" id="telepon" value="{{ reHandphone($user->telepon) }}">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2">Foto Profil</label>
				<div class="col-sm-5">
					<input type="file" class="form-control" name="image" id="image">
				</div>
				<div class="col-sm-5">
					@if($user->image == '')
					<img src="/assets/front/images/user.png" alt="{{ $user->nama_lengkap }}">
					@else
					<img src="/storage/{{ $user->image }}" alt="{{ $user->nama_lengkap }}" width="250" height="250">
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2">Alamat</label>
				<div class="col-sm-10">
					<textarea name="alamat" id="alamat" rows="10" class="form-control">{{ $user->alamat }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<button class="btn btn-2primary">Simpan</button>
				<input type="reset" value="Reset" class="btn btn-2warning">
			</div>
		</form>
	</div>
</div>

@endsection()
