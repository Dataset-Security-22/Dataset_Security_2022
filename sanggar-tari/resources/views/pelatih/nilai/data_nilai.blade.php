@extends("layouts.template_pelatih")

@section('title')
  Data Nilai
@stop

@section("content")

<div class="row" style="margin-left:100px; margin-right:10px">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Data Nilai
                </h3>
            </div>
            <div class="card-body" >
                <table id="" class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Murid</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @foreach($data_murid as $murid)
                        <tr>
                            <td class="text-center">{{ ++$no }}.</td>
                            <td class="text-center">{{ $murid->nama_murid }}</td>
                            <td class="text-center">
                                <a href="/pelatih/nilai/detail/{{ $murid->id }}" class="btn btn-success text-white btn-sm"  style="margin-left:10px; margin-right:80px"> 
                                    <i class="fas fa-clipboard"></i> Detail
                                </a>
                                <a href="/pelatih/nilai/detail_nilai/{{ $murid->id }}" class="btn btn-secondary text-white btn-sm">
                                    <i class="fas fa fa-print"></i> Print data Nilai
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

