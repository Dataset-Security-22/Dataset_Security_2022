@extends("page.layouts.template_bph")

@section("page_title", "Data KAS")

@section("content_header")

<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> Data KAS </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
          <a href="{{ url('/page/bph/dashboard') }}"> Dashboard </a>
        </li>
        <li class="breadcrumb-item active"> Data KAS Sekarang </li>
      </ol>
    </div>
  </div>
</div>

@endsection

@section("content")

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-edit"></i> KAS Tanggal : <b><?php echo date("d - m - Y") ?></b>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">NIM</th>
                <th>Nama</th>
                <th class="text-center">Bayar</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 0 @endphp
              @foreach($data_divisi as $divisi)

              <?php
                $sekarang = date("Y-m-d");
                $data_kas = DB::table("tb_kas")
                      ->where("nim_anggota", $divisi->getAnggota->nim)
                      ->where("tanggal", $sekarang)
                      ->first();
              ?>
              <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td class="text-center">{{ $divisi->getAnggota->nim }}</td>
                <td>{{ $divisi->getAnggota->nama }}</td>
                <form method="POST" action="{{ url('/page/bph/kas/simpan_data_kas') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="nim_anggota" value="{{ $divisi->getAnggota->nim }}">
                  <td class="text-center">
                    <input type="number" class="form-control" name="bayar" min="1000" placeholder="0">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan">
                  </td>
                  <td class="text-center">
                    @if($data_kas)
                    <button disabled class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i>
                    </button>
                    @else
                    <button type="submit" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i>
                    </button>
                    @endif
                  </td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section("page_scripts")

@if(session("sukses"))
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  swal({
    title: "Berhasil!",
    text: "{{ session('sukses') }}",
    icon: "success",
    button: "OK",
  });

</script>

@endif

@endsection