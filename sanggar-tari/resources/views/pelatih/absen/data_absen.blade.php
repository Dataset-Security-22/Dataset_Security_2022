@extends("layouts.template_pelatih")

@section("header")
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">
        Data Absen | Tanggal : {{ date("d - m - Y") }}
      </h1>
    </div>
  </div>
</div>
@endsection

@section("alerts")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session("tambah"))
<script>
 Swal.fire(
   'Data Berhasil di Tambahkan',
   '',
   'success'
   )
 </script>
 @elseif(session("update"))
 <script>
   Swal.fire(
     'Data Berhasil di Update',
     '',
     'success'
     )
   </script>
   @endif
   @stop


   @section("content")

<!-- <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<a href="{{ url('/admin/murid/tambah_data') }}"> 
						<h3 class="card-title">
							<span class="btn btn-success col fileinput-button dz-clickable">
								<i class="fas fa-plus"></i>
								<span >Data Murid</span>
							</span>
						</h3>
					</a>
				</div>
				<div class="card-body">
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>status</th>
								<th>Tanggal</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_murid as $dp)
							<tr>
								<td>{{ ++$no }}</td>
								<td>{{ $dp->nama_murid }}</td>
								<td>
									<input>{{ $dp->status }}<input>
								</td>
								<td>{{ $dp->jenis_kelamin }}</td>
								<td>{{ $dp->no_hp }}</td>
								<td>{{ $dp->alamat }}</td>
								<td>
									<img src="image/{{ $dp->foto }}" alt="" width="90" height="100">
								</td>
								<td>
									<a href="/admin/murid/edit/{{ $dp->id }}" class="btn btn-warning btn-sm"></i><i class="fas fa-edit"></i></a>
									<a href="/admin/murid/hapus/{{ $dp->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"></i><i class="fas fa-trash"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>		
		</div>
	</div>
</div> -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-edit"></i> Absensi Tanggal : <b><?php echo date("d - m - Y") ?></b>
          </h3>
        </div>
        <div class="card-body">
          <table id="" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Murid</th>
                <th class="text-center">Status</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 0 @endphp
              @foreach($data_murid as $absen)
              <?php
              $sekarang = date("Y-m-d");
              $data_murid = DB::table("absen")
              ->where("id_murid", $absen->id)
              ->where("tanggal", $sekarang)
              ->first();
              ?>
              <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td class="text-center">{{ $absen->nama_murid }}</td>
                <form method="POST" action="{{ url('/pelatih/absen/tambah_absen_hari_ini') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="id_murid" value="{{ $absen->id }}">
                  <td class="text-center">
                    <select class="form-control" name="status">
                      <option value="">- Pilih -</option>
                      <option value="1">Hadir</option>
                      <option value="2">Sakit</option>
                      <option value="3">Izin</option>
                      <option value="4">Alfa</option>
                    </select>
                  </td>
                  <td class="text-center">
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan">
                  </td>
                  @if($data_murid)
                  <td class="text-center">
                    <button class="btn btn-success btn-sm" disabled>
                      Sudah Absen
                    </button>
                  </td>
                  @else
                  <td class="text-center">
                    <button type="submit" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Tambah
                    </button>
                  </td>
                  @endif
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