@extends("template.layout")

@section("page_title", "DATA AKUN")

@section("page_content")

<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0">


          Akun Admin


        </h3>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
            <th scope="col" class="sort" data-sort="name">No.</th>
              <th scope="col" class="sort" data-sort="status">Nama</th>
              <th scope="col" class="sort" data-sort="status">Email</th>
              <th scope="col" class="sort" data-sort="budget">Password</th>
              <th scope="col">Aksi</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
            @php $no = 0 @endphp

            @foreach($data_akun as $akun)
            <tr>
              <td>{{ ++$no }}</td>
              <td>{{ $akun->nama }}</td>
              <td>{{ $akun->email}}</td>
              <td>{{ $akun->password }}</td>
              <td>
                <a href="/editprofil/{{ $akun->id }}" class="btn btn-warning btn-sm">
                <i class="fas fa-user-edit"></i>
                </a>
                <a onclick="return confirm('Ingin Menghapus Data Ini ?')" href="/akun/{{ $akun->id }}/hapus" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
                </a>
              </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
