<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Proyek 3 Propertiku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" qhref="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href={{url("Landing/fonts/icomoon/style.css")}}>

    <link rel="stylesheet" href={{url("Landing/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/magnific-popup.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/jquery-ui.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/owl.theme.default.min.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/bootstrap-datepicker.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/mediaelementplayer.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/animate.css")}}>
    <link rel="stylesheet" href={{url("Landing/fonts/flaticon/font/flaticon.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/fl-bigmug-line.css")}}>


    <link rel="stylesheet" href={{url("Landing/css/aos.css")}}>

    <link rel="stylesheet" href={{url("Landing/css/style.css")}}>

  </head>
  <body>

  <div class="site-loader"></div>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0"><strong>Propertiku</strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li>
                    <a href="/">Home</a>
                  </li>
                  <li >
                    <a href="/properties">Properties</a>
                  </li>
                  <li><a href="/blog">Blog</a></li>
                  <li class="active"><a href="/about">About</a></li>

                  @if(empty(auth()->user()->name))
                  {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/admin/login') }}"> Login </a></li> --}}
                  <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}"> Login </a></li>
                  @else
                  {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/pengunjung/full-calender/') }}">Events</a></li> --}}
                  <li class="nav-item"><a class="nav-link" href="{{ url('/admin/logout') }}"> Logout </a></li>
                  @endif
                </ul>
              </nav>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(Landing/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">About</h1>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
    <div class="container">
      <div class="row mb-5 justify-content-center"  data-aos="fade-up" >
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2>Upload Syarat</h2>
          </div>
          <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success col fileinput-button dz-clickable"
                    data-toggle="modal" data-target="#modal-default" title="Tambah Data">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
            </h3>
        </div>
        </div>
      </div>
      <div class="row">

        @foreach ($foto_syarat as $desk)
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">

              <img src="{{ url('storage/' . $desk->image) }}" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">
                <h2 class="mb-2 font-weight-light text-black h4">{{ $desk->nama_pengguna }}</h2>
                {{-- <span class="d-block mb-3 text-white-opacity-05">Front End Programmer </span> --}}
                {{-- <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p> --}}
                <td class="text-center">
                    <button onclick="editSyarat({{ $desk->id }})" type="button" class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-default-edit" title="Detail Data">
                        <i class="fa fa-clipboard"> Edit </i>
                    </button>
                    <button id="deleteSyarat" data-id="{{ $desk->id }}"
                        class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                </td>
              </div>

            </div>
          </div>
        @endforeach







            <!-- Tambah Data -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">kemp
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('/owner/foto_syarat/tambah_foto_syarat') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Foto </label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input multiple type="file" name="image[]" class="form-control" id="foto"
                                placeholder="Masukan Foto/Gambar" required onchange="viewImage()">
                            <div class="text-danger">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-social btn-success btn-flat bt-sm" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->





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
                    <form method="POST" action="{{ url('/about/simpan') }}" enctype="multipart/form-data">
                        @method('PUT')
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
















        </div>
    </div>
    </div>
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Proyek 3</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Properties</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Terms</a></li>
                </ul>
              </div>
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>



          </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy;<script data-cfasync="false" ></script><script>document.write(new Date().getFullYear());</script> Kelompok 4 <i class="icon-heart text-danger" aria-hidden="true"></i>
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>


  <script src={{url("Landing/js/jquery-3.3.1.min.js")}}></script>
  <script src={{url("Landing/js/jquery-migrate-3.0.1.min.js")}}></script>
  <script src={{url("Landing/js/jquery-ui.js")}}></script>
  <script src={{url("Landing/js/popper.min.js")}}></script>
  <script src={{url("Landing/js/bootstrap.min.js")}}></script>
  <script src={{url("Landing/js/owl.carousel.min.js")}}></script>
  <script src={{url("Landing/js/mediaelement-and-player.min.js")}}></script>
  <script src={{url("Landing/js/jquery.stellar.min.js")}}></script>
  <script src={{url("Landing/js/jquery.countdown.min.js")}}></script>
  <script src={{url("Landing/js/jquery.magnific-popup.min.js")}}></script>
  <script src={{url("Landing/js/bootstrap-datepicker.min.js")}}></script>
  <script src={{url("Landing/js/aos.js")}}></script>
  <script src={{url("Landing/js/circleaudioplayer.js")}}></script>
  <script src={{url("Landing/js/main.js")}}></script>

  <script src="/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Select2 -->
<script src="{{ url('/template') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/template/plugins/moment/moment.min.js"></script>
<script src="/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/template/dist/js/pages/dashboard.js"></script>
<script src="/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/template/plugins/jszip/jszip.min.js"></script>
<script src="/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
$(function () {
    $('.select2').select2(),
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    }),
    $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>




    <script type="text/javascript">
        function editSyarat(id) {
            $.ajax({
                url: "{{ url('/about/edit') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#modal-content-edit").html(data);
                    return true;
                }
            });
        }


        $(document).ready(function() {
            $("#table-1").dataTable();
            $('body').on('click', '#deleteSyarat', function() {
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
                        form_string =
                            "<form method=\"POST\" action=\"{{ url('/about/hapus/') }}/" +
                            id +
                            "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"
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


  </body>
</html>
