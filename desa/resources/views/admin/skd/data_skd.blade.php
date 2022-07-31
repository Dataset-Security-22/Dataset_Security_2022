@extends("template.layout")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


@section("page_title", "DATA SKD")

@section("page_content")

<div class="row align-items-center py-4">
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="/dashboard">Dashboards</a></li>
        <li class="breadcrumb-item active" aria-current="page">Default</li>
      </ol>
    </nav>
  </div>
  <div class="col-lg-6 col-5 text-right">
  <a href="" class="btn btn-sm btn-neutral" data-bs-toggle="modal" data-bs-target="#exampleModal">Rekap Surat</a>
    <a href="{{ url('/skd/form_tambah_skd') }}" class="btn btn-sm btn-neutral">Tambah Data</a>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0">
          @if(auth()->user()->role == 1)

          Helo

          @else

           Surat Keterangan Domisili

          @endif
        </h3>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">No.</th>
              <th scope="col" class="sort" data-sort="status">Nama</th>
              <th scope="col" class="sort" data-sort="status">Tempat Lahir</th>
              <th scope="col" class="sort" data-sort="budget">Tanggal Lahir</th>
              <th scope="col" class="sort" data-sort="budget">Jenis Kelamin</th>
              <th scope="col" class="sort" data-sort="status">Agama</th>
              <th scope="col" class="sort" data-sort="status">Nohp</th>
              <th scope="col" class="sort" data-sort="budget">Keterangan</th>

              <th scope="col">Aksi</th>
              <!-- <th scope="col"></th> -->
            </tr>
          </thead>
          <tbody class="list">
            @php $no = 0 @endphp
            @foreach($data_skd as $skd)
            <tr>
              <td>{{ ++$no }}</td>
              <td>{{ $skd->nama }}</td>
              <td>{{ $skd->tempat_lahir }}</td>
              <td>{{ $skd->tanggal_lahir }}</td>
              <td>{{ $skd->jenis_kelamin }}</td>
              <td>{{ $skd->agama }}</td>
              <td>{{ $skd->nohp }}</td>
              <td>{{ $skd->keterangan }}</td>
              <td>
                <a href="/skd/edit/{{$skd->id}}" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="http://127.0.0.1:8080/jasperserver/rest_v2/reports/reports/skd.pdf?id={{$skd->id}}" class="btn btn-danger btn-sm" target="_blank">
                  <i class="fas fa-print"></i>
                </a>
                <a onclick="return confirm('Ingin Menghapus Data SKD Ini ?')" href="/skd/{{ $skd->id }}/hapus" class="btn btn-warning btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
                <a href="https://api.whatsapp.com/send?phone={{ $skd->nohp }}&text=Halo%20{{ $skd->nama }} Surat Keterangan Domisili untuk Anda telah selesai dibuat. %0AMohon segera diambil di Balai Desa Dermayu, serta membawa identitas KTP atau KK.%0ATerimakasih..." class="btn btn-danger btn-sm">
                <i class="fab fa-whatsapp"></i>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rekap Surat Keterangan Domisili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tglm" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                @csrf
                                <input type="date" name="tgls" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="button" id="cek2" value="Cek" class="btn btn-primary">
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
                        </tr>
                    </thead>

                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>


