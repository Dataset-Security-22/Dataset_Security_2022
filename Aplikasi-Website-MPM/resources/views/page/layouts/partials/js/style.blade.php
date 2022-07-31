<script src="{{ url('/layouts') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/layouts') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/layouts') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('/layouts') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('/layouts') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ url('/layouts') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/layouts') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('/layouts') }}/plugins/moment/moment.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/layouts') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ url('/layouts') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/layouts') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/layouts') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/layouts') }}/dist/js/pages/dashboard.js"></script>

<script src="{{ url('/layouts') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('.select2').select2(),
    $('.select3bs4').select2({
      theme: 'bootstrap4'
    }),
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
<script>
  $(function () {
    $('#summernote').summernote(),
    $('#summernote1').summernote(),
    $('#summernote2').summernote(),
    $('#summernote3').summernote(),
    $('#summernote4').summernote(),
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>