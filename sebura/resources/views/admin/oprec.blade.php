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
<h1 class="h3 mb-2 text-gray-800">Data Open Recruitmen</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>No. WhatsApp</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td><img src="/storage/oprec/{!! $item->gambar !!}" alt="{!! $item->nama !!}"
                                class="img-responsive" width="75" title="{!! $item->nama !!}"></td>
                        <td>
                            <?php
                                if ($item->diterima==1){
                                    ?>
                            <div class='badge badge-success'><i>Sudah diterima</i></div>
                            <form action="/deleteoprec/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit"
                                    class=" btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                            <?php
                            }else if ($item->ditolak==2){ ?>
                            <div class="badge badge-danger"><i>Ditolak</i></div>
                            <form action="/deleteoprec/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit"
                                    class=" btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                            <?php } else {
                                ?>
                            <form action="/oprecditerima/{{ $item->id }}/{{ $item->no_telp }}" method="POST"
                                target="_blank">
                                @csrf
                                <button class="btn btn-success">
                                    Terima
                                </button>
                            </form>
                            <form action="/oprecditolak/{{ $item->id }}/{{ $item->no_telp }}" method="POST"
                                target="_blank">
                                @csrf
                                <button class=" btn btn-danger">
                                    Tidak
                                </button>
                            </form>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
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
