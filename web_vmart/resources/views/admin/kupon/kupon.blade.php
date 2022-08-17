
@extends("Layout.v_template")
@section('title','Kupon')
@section('content-header')
<h1>
    @yield('title')
    <small>@yield('title')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

    <li class="active">@yield('title')</li>
  </ol>
@endsection
@section("page_scripts")

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session("gagal"))

<script>
    Swal.fire(
    'Gagal!',
    '{{ session("gagal") }}',
    'error'
    )
</script>

@elseif(session("sukses"))

<script>
    Swal.fire(
    'Berhasil!',
    '{{ session("sukses") }}',
    'success'
    )
</script>

@endif

@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah @yield('title')</h3>

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/kupon/insert" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_kupon">Nama kupon</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan nama kupon" value="{{ old('name') }}"required>
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Masukan kode" value="{{ old('kode') }}"required>
                        <label for="potongan">Potongan</label>
                        <input type="text" class="form-control" id="credit" name="credit" placeholder="Masukan Potongan" value="{{ old('credit') }}"required>
                        <label for="tgl mulai kupon">Tgl mulai kupon</label>
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                            <input name="start_date" class="form-control" placeholder="Tanggal Mulai" type="date" required>
                        <label for="tgl berakhir kupon">Tgl berakhir kupon</label>
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                            <input name="expired_date" class="form-control" placeholder="Tanggal kadaluarsa" type="date" required>
                    </div>
                </div>

                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data @yield('title')</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Kupon</th>

                            <th>Kode</th>
                            <th>Potongan</th>
                            <th>Tanggal mulai</th>
                            <th>Tanggal selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no =1; ?>
                        @foreach ($coupon as $data )
                        <tr>
                            <td>{{ $no++ }}</td>

                            <td>{{ $data->name }}</td>
                            <td>{{ $data->code }}</td>
                            <td>{{ $data->credit }}</td>
                            <td>{{ $data->start_date }}</td>
                            <td>{{ $data->expired_date }}</td>
                            <td>
                                {{-- <a href="/buku/detail/{{ $data->id_kategori }}" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a> --}}
                                <a href="/kupon/edit/{{ $data->id }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                <form action="/kupon/hapus" method="POST" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>


                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    @endsection


