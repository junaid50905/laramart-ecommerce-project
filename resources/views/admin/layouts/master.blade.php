<!DOCTYPE html>
<html lang="en">
<!--Head start-->
@include('admin.layouts.includes.head')
<!--Head end-->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!--Top Navbar -->
  @include('admin.layouts.includes.topnavbar')
  <!-- /.top navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.includes.sidenavbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page_headline')</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('main_content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer-->
  @include('admin.layouts.includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!--scripts-->
@include('admin.layouts.includes.scripts')
</body>
</html>
