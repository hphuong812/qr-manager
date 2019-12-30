<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Trang quét sản phẩm</title>
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
    <link rel="stylesheet" href="{{route('home')}}/dist/css/scan.css">

    <script src="{{route('home')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{route('home')}}/plugins/chart.js/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">        
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper sidebar-mini" style="margin-left: 0;" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quét sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quét sản phẩm</li>
                    </ol>
                </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="contact">
                    <div class="row">
                        {{-- Scan QR --}}
                        <div class="col-md-3">
                            <div class="row col-md-12">
                                <div class="card card-warning col-md-12">
                                    <div class="card-header">
                                    <h3 class="card-title">Quét mã QR</h3>
                                    </div>
                                
                                    <div>
                                        <form action="">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <video class="scan" style="width: 350px;height: 210px; margin: 5%;" autoplay="true" id="video-scan-qr"></video>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="card card-warning col-md-12">
                                    <div class="card-header">
                                    <h3 class="card-title">Ảnh sản phẩm</h3>
                                    </div>
                                    <div>
                                        <img id="imgProduct" style="width: 350px;height: 350px; margin: 5%;" src="dist/img/avatar04.png" alt="">
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>

                        {{-- show products --}}
                        <div class="col-md-6" >
                            <div class="row">
                                <div class="card card-warning col-md-12">
                                    <div class="card-header">
                                    <h3 class="card-title">Danh sách sản phẩm</h3>
                                    </div>
                                    <div class="scroll">
                                        <table class="table table-light">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th><input type="checkbox" id="select_all"></th>
                                                    <th>Hình ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    {{-- table content --}}
                                            </tbody>
                                        </table>
                                    </div>
                                
                                    <div class="row">
                                        <h5 class="price_text">Tổng tiền:</h5>
                                        <h4 class="price"> 0 đ</h4>
                                        <button id="btn-checkout" class="btn btn-info btn_tt btn-lg">Thanh toán</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        {{--  --}}
                        <div class="col-md-3 " >
                            <div class="row col-md-12" id="payment" style="display: none">
                                <div class="card card-warning col-md-12">
                                    <div class="card-header">
                                    <h3 class="card-title">Quét face</h3>
                                    </div>
                                    {{--  <iframe src="http://192.168.61.27:8000" frameborder="0"></iframe>  --}}
                                </div>
                            </div>
                            <div class="row col-md-12" id="info-customer" style="display: none">
                                <div class="card card-warning col-md-12">
                                    <div class="card-header">
                                    <h3 class="card-title">Thông tin khách hàng</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label >Chủ tài khoản</label>
                                            <input type="text" class="form-control"  name="ChuTaiKhoan"
                                            value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Số tài khoản</label>
                                            <input type="text" class="form-control"  name="SoTaiKhoan"
                                            value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Thanh toán</label>
                                            <input type="text" class="form-control"  name="ThanhToan"
                                            value=" đ" required>
                                        </div>
                                    </div>
                                    <div style="margin-left: 37%; margin-bottom: 2%;">
                                        <button type="submit" class="btn btn-info btn_tt">Thanh toán</button>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- jQuery -->
    <script src="{{route('home')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{route('home')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{route('home')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{route('home')}}/dist/js/adminlte.min.js"></script>
    <!-- Intascan -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    
    <!-- sweelalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{route('home')}}/dist/js/demo.js"></script>
    <script src="{{ asset('build') }}/js/scan_product.js"></script>
</body>
</html>

