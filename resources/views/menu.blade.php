<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Trang quản lý</title>
  <base href="{{ asset('') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{route('home')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{route('home')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{route('home')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{route('home')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{route('home')}}/plugins/summernote/summernote-bs4.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <!-- REQUIRED SCRIPTS -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- jQuery -->
  <script src="{{route('home')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{route('home')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{route('home')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{route('home')}}/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{route('home')}}/dist/js/demo.js"></script>

  <!-- js -->
  {{-- <script type="text/javascript" src="{{route('home')}}/js/jquery-2.1.4.min.js"></script>
  <!-- //js -->
  <script src="{{route('home')}}/js/modernizr.custom.js"></script>
  <!-- Custom-JavaScript-File-Links -->
  <!-- cart-js -->
  <!-- <script src="js/minicart.min.js"></script> -->
  <!-- script for responsive tabs -->
  <script src="{{route('home')}}/js/easy-responsive-tabs.js"></script>
  <!-- //script for responsive tabs -->
  <!-- stats -->
  <script src="{{route('home')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{route('home')}}/js/jquery.countup.js"></script>
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="{{route('home')}}/js/move-top.js"></script>
  <script type="text/javascript" src="{{route('home')}}/js/jquery.easing.min.js"></script>
  <!-- for bootstrap working -->
  <script type="text/javascript" src="{{route('home')}}/js/bootstrap.js"></script> --}}

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{route('home')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="{{route('home')}}/plugins/raphael/raphael.min.js"></script>
  <script src="{{route('home')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="{{route('home')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="{{route('home')}}/plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="{{route('home')}}/dist/js/pages/dashboard2.js"></script>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('home')}}/dashboard" class="nav-link">Trang chủ</a>
        </li>

      </ul>

      <!-- SEARCH FORM -->

      <form id="Search" method="post" action="{{ route('home') }}/danhsachSPTK" class="form-inline ml-3">
        @csrf
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search"
            name="search" require>
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit" id="searchB">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{route('home')}}/dist/img/user1-128x128.jpg" alt="User Avatar"
                  class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Khánh
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Phản hồi sản phẩm</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 tiếng trước</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{route('home')}}/dist/img/user8-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Phúc
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Sản phẩm mới ..</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 tiếng trước</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{route('home')}}/dist/img/user3-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Liên
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Yêu cầu trợ giúp..</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 tiếng trước</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Xem tất cả</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Thông báo</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 Tin nhắn
              <span class="float-right text-muted text-sm">3 phút</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 khách hàng mới
              <span class="float-right text-muted text-sm">12 tiếng</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 báo cáo
              <span class="float-right text-muted text-sm">2 ngày</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Xem tất cả</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
              class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="https://t4.ftcdn.net/jpg/02/14/23/85/240_F_214238568_CNPRnuwt9y5AB6YUnH7Hb0iCMrnVmIPo.jpg"
          alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{route('home')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="{{route('home')}}/dashboard" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Thêm sản phẩm

                </p>
              </a>

            </li>
            <li class="nav-item has-treeview">
              <a href="{{route('home')}}/danhsach-sp" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Danh sách sản phẩm

                </p>
              </a>

            </li>
            <li class="nav-item has-treeview">
              <a href="{{route('home')}}/scan-product" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  quét sản phẩm

                </p>
              </a>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>