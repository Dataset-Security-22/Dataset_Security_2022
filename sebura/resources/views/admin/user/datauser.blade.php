@extends('layouts.mainadmin')

@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('topbar')
@include('layouts.topbar')
@endsection
@section('content')
@if (session('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            Berhasil
        </div>
    </div>
</div>
@endif
<!-- Page Heading -->
<div class="row">
    <div class="col-md-11">
        <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    </div>
</div>

<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @php $no = 0 @endphp
                    @foreach($data_user as $user)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roled->role_name }}</td>
                        <td class="d-flex">
                            <form method="POST" action="{{ url('deleteuser') }}/{{ $user->id }}">
                                <a href="{{ url('/admin/edituser') }}/{{ $user->id }}" class="btn btn-warning btn-sm">
                                    <i style="font-size:12px" class="fa">&#xf044;</i>
                                </a>
                                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
