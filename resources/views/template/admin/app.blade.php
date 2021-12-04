<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @section('title')
  @show
   @include('template.admin.stylesheet')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  @include('template.admin.preloader')

  <!-- Navbar -->
 @include('template.admin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@section('sidebar')
@show

  <!-- Content Wrapper. Contains page content -->
  @section('main-section')
  @show
  <!-- /.content-wrapper -->
  <!--footer-->
 @include('template.admin.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('template.admin.js')
</body>
</html>
