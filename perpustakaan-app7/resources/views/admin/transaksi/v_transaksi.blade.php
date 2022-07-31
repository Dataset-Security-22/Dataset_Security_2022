@extends('Layout.v_template')
@section('title','Transaksi')
@if(auth()->user()->id_role == 2)
@section('content-header')
<h1>
    @yield('title')
    <small>@yield('title')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

    <li class="active">Sirkulasi</li>
    <li class="active">@yield('title')</li>
  </ol>
@endsection
@elseif(auth()->user()->id_role == 1)
@section('content-header')
<h1>
    Laporan
    <small>Laporan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

    <li class="active">Laporan</li>
  </ol>
@endsection
@endif
@section('content')
<div class="row">
    <div class="col-xs-12">
        @if(auth()->user()->id_role == 2)
        <p><a href="/transaksi/form_peminjaman" class=" btn btn-primary btn-sm"style="width: 150px;"><i class="fa fa-plus"></i> Tambah @yield('title')</a></p>
        @elseif(auth()->user()->id_role == 1)
        @endif
      <div class="box">

        <div class="box-header with-border">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cek">
                rekap
                </button>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Kode Peminjaman</th>
              <th>Buku</th>
              <th>Nama Peminjaman</th>
              <th class="text-center">Tgl Pinjam</th>
              <th class="text-center">Tanggal Kembali</th>
              <th class="text-center">Status</th>

              <th class="text-center">Denda</th>
              @if(auth()->user()->id_role == 2)
              <th class="text-center">Aksi</th>
              @elseif(auth()->user()->id_role == 1)
              <th>Penanganan</th>
              <th class="text-center">Aksi</th>
              @endif
            </tr>
            </thead>
            <tbody>
                <?php $no =1; ?>
            @foreach ( $transaksi as $data )

            <tr>
              <td class="text-center">{{ $no++ }}</td>
              <td class="text-center">{{ $data->kode_transaksi}}</td>
              <td> @if(empty($data->getBuku->judul))
                <i>
                    <b>NULL</b>
                </i>
                @else
                {{ $data->getBuku->judul }}
                @endif</td>
              <td>
                  @if(empty($data->getAnggota->nama_anggota))
                  <i>
                    <b>NULL</b>
                </i>
                  @else
                    {{$data->getAnggota->nama_anggota}}
                  @endif
              </td>
              <td class="text-center">{{ $data->tanggal_pinjam}}</td>
              <td class="text-center">{{ $data->tanggal_kembali }}</td>
              <td class="text-center">
                @if ($data->tanggal_mengembalikan != NULL)

                    @if($data->tanggal_mengembalikan > $data->tanggal_kembali)
                        @if($data->denda == NULL)
                        <span class="badge bg-red">denda</span>
                        @elseif($data->denda != NULL)
                        <span class="badge bg-green">selesai</span>
                        @endif
                    @else
                    <span class="badge bg-green">selesai</span>
                    @endif

                @else
                <span class="badge bg-light-blue">proses</span>

                @endif


              </td>
              <td class="text-center">Rp. {{ number_Format($data->denda) }}</td>
              @if(auth()->user()->id_role == 2)
              <td class="text-center">

                @if ($data->tanggal_mengembalikan != NULL)

                    @if($data->tanggal_mengembalikan  > $data->tanggal_kembali)
                        @if($data->denda == NULL)
                        <a href="{{ url('/transaksi/bayar_denda') }}/{{ $data->id_transaksi }}" class="btn btn-danger btn-sm">
                            Bayar Denda
                        </a>
                        @elseif($data->denda != NULL)

                        @endif
                    @else

                    @endif
                @else
                <a href="/transaksi/detail/{{ $data->id_transaksi }}" class="btn btn-primary btn-sm">
                    Detail
                  </a>
                  <form action="{{ url('/transaksi/pengembalian') }}" method="POST" style="display: inline;">
                    <input type="hidden" name="id_transaksi" value="{{ $data->id_transaksi }}">
                    @csrf
                    <button type="submit" class="btn btn-info btn-sm">
                        <i class="fa fa-plus"></i> Kembalikan
                      </button>
                  </form>

                @endif

              </td>
              @elseif(auth()->user()->id_role == 1)

              <td>
                  @if(empty($data->getUser->name))
                  <i>
                    <b>NULL</b>
                </i>
                  @else
                    {{$data->getUser->name}}
                  @endif
              </td>
                <td>
                    <a href="/transaksi/detail/{{ $data->id_transaksi }}" class="btn btn-primary btn-sm">
                        Detail
                      </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $data->id_transaksi }}">
                    <i class="fa fa-trash"></i>
                    </button>
                </td>
              @endif

            </tr>


            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      {{-- @foreach ( $users as $data)


      <div class="modal modal-danger fade" id="delete{{ $data->id }}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{ $data->name }}</h4>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus petugas ini!</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
              <a href="petugas/delete/{{ $data->id }}" class="btn btn-outline">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach --}}




    @foreach ( $transaksi as $data)


    <div class="modal modal-danger fade" id="delete{{ $data->id_transaksi }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ $data->kode_transaksi }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus Data ini!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <a href="transaksi/hapus/{{ $data->id_transaksi }}" class="btn btn-outline">Yes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        @endforeach


<div class="modal modal-primary fade" id="cek">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Rekap Data</h4>
                </div>
                <div class="modal-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label> Tanggal mulai</label>
                                        <input type="date" class="form-control" name="tglm">
                                    </div>
                                    <div class="col-lg-4">
                                        @csrf
                                        <label> Tanggal Selesai </label>
                                        <input type="date" class="form-control" name="tgls">
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="button" id="cek1" value="Cek" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Jumlah</th>
                                        <th>Denda</th>
                                    </tr>
                                </thead>

                                <tbody></tbody>
                            </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="" class="btn btn-outline">Yes</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('page_scripts')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            }
        });
        $("#cek1").on('click', function() {
            let tglm = $("input[name='tglm']").val().trim();
            let tgls = $("input[name='tgls']").val().trim();

            let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
            empTable.innerHTML = "";

            $.ajax({
                url: '/transaksi/rekap',
                type: 'post',
                data: {
                    tglm: tglm,
                    tgls: tgls
                },
                success: function(response) {
                    let NewRow = empTable.insertRow(0);
                    let tglmCell = NewRow.insertCell(0);
                    let tglsCell = NewRow.insertCell(1);
                    let jumlahCell = NewRow.insertCell(2);
                    let dendaCell = NewRow.insertCell(3);

                    tglmCell.innerHTML = tglm;
                    tglsCell.innerHTML = tgls;
                    jumlahCell.innerHTML = response.jumlah;
                    dendaCell.innerHTML = response.denda;
                }
            })
        })
    })
</script>
@endsection

