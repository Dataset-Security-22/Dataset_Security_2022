@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="container mt-5">
    <div class="row content">
        <div class="col-md-6 mb-3">
            <img src="/img/img.svg" alt="" srcset="" width="500">
        </div>
        <div class="col-md-6">
            <h3 class="signin-text mb-3"> Sign In</h3>
            <form action="/login" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button class="btn btn-primary">Login</button>
                @csrf
            </form>
        </div>
    </div>
</div>

@endsection
