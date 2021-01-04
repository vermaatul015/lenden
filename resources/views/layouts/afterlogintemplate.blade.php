<!DOCTYPE html>
<html>
<head>
    @include('common.head')
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition sidebar-mini text-sm">
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-dark navbar-lightblue navbar-white-text text-sm" style="margin-left:0px;">
  @include('common.nav')
</nav>
  {{--@include('common.sidebar')--}}
 
  <!-- Full Width Column -->
  <div class="content-wrapper" style="margin-left:0px;">
    
      @include('common.breadcrum')
      
       @yield('content')
  </div>
    
  
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="margin-left:0px;">
  @include('common.footer')
  </footer>
  <aside class="control-sidebar control-sidebar-dark" >
    <!-- Control sidebar content goes here -->
  </aside>
  
</div>
<!-- ./wrapper -->

@include('common.footer_script')

</body>
</html>
