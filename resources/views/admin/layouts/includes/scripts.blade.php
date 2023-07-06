

<!-- jQuery -->
<script src="{{ asset('ui/admin') }}/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('ui/admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('ui/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('ui/admin') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('ui/admin') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('ui/admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('ui/admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('ui/admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->

<script src="{{ asset('ui/admin') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('ui/admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('ui/admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('ui/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('ui/admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('ui/admin') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('ui/admin') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('ui/admin') }}/dist/js/pages/dashboard.js"></script>
<!-- bootstrap tag-inputs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script>
      <script>
    $(function () {
      $('input')
        .on('change', function (event) {
          var $element = $(event.target);
          var $container = $element.closest('.example');

          if (!$element.data('tagsinput')) return;

          var val = $element.val();
          if (val === null) val = 'null';
          var items = $element.tagsinput('items');

          $('code', $('pre.val', $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $('code', $('pre.items', $container)).html(
            JSON.stringify($element.tagsinput('items'))
          );
        })
        .trigger('change');
    });
  </script>
</script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('ui/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('ui/admin') }}/plugins/dropify/dropify.min.js"></script>
    <!-- AdminLTE App -->

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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

{{-- category edit with ajax request --}}
    <script>
        $(document).ready(function () {
            $(document).on('click', '.editBtn', function(){
                var category_id = $(this).val()
                $.get('category/edit/'+category_id, function(data){
                    $('#name').val(data.name)
                    $('#id').val(data.id)
                });
            });
        });
    </script>


{{-- subcategory edit with ajax request --}}
    <script>
         $(document).ready(function () {
            $(document).on('click', '.editSubCatBtn', function(){
                var subcategory_id = $(this).val()
                $.get('subcategory/edit/'+subcategory_id, function(data){
                    $('#subcategory_name').val(data.subcategory_name);
                    $('#category_id').val(data.category_id);
                    $('#id').val(subcategory_id);
                });
            });
        });
    </script>

{{-- dropify --}}

<script>
    $('.dropify').dropify();
</script>









