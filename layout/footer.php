<footer class="main-footer">
    <strong>Copyright &copy; 2006-2024 by <a href="https://www.instagram.com/irfanmhr_?igsh=bTJpNzl0Mms1amJj">Irfan Mahardika</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versio</b> nu saena
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="access-template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="access-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="access-template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="access-template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="access-template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="access-template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="access-template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="access-template/plugins/moment/moment.min.js"></script>
<script src="access-template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="access-template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="access-template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="access-template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="access-template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="access-template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="access-template/dist/js/pages/dashboard.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- asset plugin datatables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('alamat', {
            filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
            filebrowserUploadUrl: 'assets/ckfinder/core/connentor/php/connection.php?command=QuickUploadtype=files',
            height: '400px'
        });
    </script>

    <script>
        CKEDITOR.replace( 'alamat' );
    </script>
    
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <!-- DataTables  & Plugins -->
    <script src="access-template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="access-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="access-template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="access-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="access-template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="access-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="access-template/plugins/jszip/jszip.min.js"></script>
    <script src="access-template/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="access-template/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="access-template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="access-template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="access-template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

    <script>
      $(function() {
        $('#example2').DataTable();
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#serverside').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            "url": "mahasiswa-serverside.php?action=table_data",
            "dataType": "json",
            "type": "POST"
          },
          columns: [
            {"data": "no"},
            {"data": "nama"},
            {"data": "prodi"},
            {"data": "jk"},
            {"data": "telepon"},
            {"data": "aksi"},
          ]
        });
      });
    </script>
</body>
</html>