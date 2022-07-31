<script src="{{ url('/template') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/template') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/template') }}/dist/js/demo.js"></script>

<script src="{{ url('/template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/template') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('/template') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('/template') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/template') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ url('/template') }}/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2(),
    $('.select3').select2(),
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
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