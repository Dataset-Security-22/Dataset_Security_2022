@extends("layouts.template_owner")

@section('title')
Data Transaksi
@stop

@section("header")
<script>
    function viewImage()
    {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Transaksi</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/owner/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item active"> Transaksi </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @if(session("tambah"))
            <div class="alert alert-success" role="alert">
                {{  session("tambah")  }}
            </div>
            @elseif(session("update"))
            <div class="alert alert-warning" role="alert">
                {{ session("update") }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center"> Order Id </th>
                                <th class="text-center"> Harga </th>
                                <th class="text-center"> MeTode Pembayaran </th>
                                <th class="text-center"> Validasi </th>
                                <th class="text-center"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 0 @endphp
                            @foreach($validasiTransaksi as $desk)
                            <tr>
                                <td class="text-center">{{ ++$no }}</td>
                                <td>{{ $desk->name }}</td>
                                <td>{{ $desk->order_id }}</td>
                                <td>{{ currency_IDR($desk->gross_amount) }}</td>
                                <td>{{ $desk->payment_type }}</td>
                                <td>
                                    @if (empty($desk->validasi))
                                        <b>
                                            <i>
                                                Belum Validasi
                                            </i>
                                        </b>
                                    @else
                                    {{$desk->validasi}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button onclick="editSyarat({{ $desk->id }})" type="button" class="btn btn-success text-white btn-sm" data-toggle="modal" data-target="#modal-default-edit" title="Detail Data">
                                        <i class="fa fa-clipboard"> Edit </i>
                                    </button>
                                    <button id="deleteTransaksi" data-id="{{ $desk->id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Edit Data -->
<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/owner/transaksi/simpan') }}">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END -->

@endsection

@section("scripts_js")

<script type="text/javascript">
    function editSyarat(id)
    {
        $.ajax({
            url : "{{ url('owner/transaksi/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }


    $(document).ready(function() {
        $("#table-1").dataTable();
        $('body').on('click', '#deleteTransaksi', function () {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Anda Yakin Hapus File?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string = "<form method=\"POST\" action=\"{{ url('/owner/transaksi/hapus/') }}/"+id+"\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"
                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Selamat!', 'Data anda tidak jadi dihapus', 'error');
                }
            })
        })
    })
</script>
<script src="{{ url('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
@if (session('message'))
        {!! session('message') !!}
@endif

@endsection
