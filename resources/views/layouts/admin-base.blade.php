<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mavirgo Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Anthony Okagba">
  <link rel="shortcut icon" href="{{ asset ('img/logo.jpg') }}" type="image/x-icon" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset ('plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
        </div> --}}
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset ('img/logo.jpg') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Anthony</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ('dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (Route::has('login'))
               @auth
                   @if(Auth::user()->utype === 'ADM')

                   <a href="#"><i class="icon-user"></i></a>
                   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item ">
                        <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->is('admin/dashboard') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Dashboard
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.products')}}" class="nav-link {{request()->is('admin/products') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                            Products
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.orders')}}" class="nav-link {{request()->is('admin/orders') ? 'active' : ''}}">
                          <i class="nav-icon fa fa-cart-plus"></i>
                          <p>
                            Orders
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="nav-icon fa fa fa-sign-out-alt"></i>
                          <p>
                            Logout
                          </p>
                          <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </a>
                      </li>
                   </ul>
                   @elseif(Auth::user()->utype === 'USR')
                   <a href="#"><i class="icon-user"></i></a>
                   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item ">
                        <a href="{{route('user.dashboard')}}" class="nav-link {{request()->is('user/dashboard') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Dashboard
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('user.orders')}}" class="nav-link {{request()->is('user/orders') ? 'active' : ''}}">
                          <i class="nav-icon fa fa-cart-plus"></i>
                          <p>
                            Orders
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="nav-icon fa fa-sign-out-alt"></i>
                          <p>
                            Logout
                          </p>
                          <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </a>
                      </li>
                   </ul>
                   @endif
               @endif
           @endif

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    {{-- {{$slot}} --}}
    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="/">Anthony</a>.</strong>
    {{-- All rights reserved. --}}
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset ('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset ('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset ('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset ('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset ('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset ('plugins/chart.js/Chart.min.js') }}"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
      $('#summernote1').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
</body>
</html>
