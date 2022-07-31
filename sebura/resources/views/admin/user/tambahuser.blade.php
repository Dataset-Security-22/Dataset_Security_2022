@extends('layouts.mainadmin')

@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('topbar')
@include('layouts.topbar')
@endsection
@section('content')

@if(session("sukses"))
<div class="alert alert-success">
    {{ session("sukses") }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('/admin/tambahuser') }}" method="post">
            @csrf
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                <input type="text" name="email" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                <input type="text" name="password" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Role</span>
                <input type="text" name="role" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="col-md-2 ">
                <button type="submit" class="btn btn-success">
                    Tambah data
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
