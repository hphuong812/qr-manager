@extends('master')
@section('content')
    <script>   
        // function xoa(id) {
            
        // //         $("#mi-modal").modal('show');
        

        // //     $("#modal-btn-si").on("click", function(){
        // //         callback(true, id);
        // //         $("#mi-modal").modal('hide');
                
        // //     });
            
        // //     $("#modal-btn-no").on("click", function(){
        // //         callback(false, id);
        // //         $("#mi-modal").modal('hide'); 
                
        // //     });
        // // };
                                
        // // function callback(confirm, ids){
        // //     if(confirm){
        //         $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //         });
        //         $.ajax({
        //             type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
        //             url : 'deleteProduct', //gửi dữ liệu sang trang data.php
        //             data : {
        //                 id: ids
        //             }, //dữ liệu sẽ được gửi
        //             success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
        //                         { 
        //                        alert(data);
        //                         }
        //             });
        //                 // return false;
        //                 location.reload();    
        //     // }else{

        //     // }
        // };
        function DeleteCart(IDSP) {
            var data = IDSP
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST', //Sử dụng kiểu gửi dữ liệu POST
                url: 'Xoa', //gửi dữ liệu sang trang data.php
                data: {
                    ID_SP: data

                }, //dữ liệu sẽ được gửi
                success: function (data) {
                    alert(data);
                }
            });


        };
    </script>
    <!-- Content Wrapper. Contains page content -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa sản phẩm này!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal-btn-si">Yes</button>
                <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
            </div>
            </div>
        </div>
        </div>

        <div class="alert" role="alert" id="result"></div>
    </div>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1>Danh sách sản phẩm</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
        </ol>
    </div>
    </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
    <div class="col-12">
    <div class="card">
        
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th style="width: 50px;">img</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th style="width: 50px;">Mã QR</th>
            <th style="width: 50px;">Xóa</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($DanhSachSP as $item)
                    <tr>
                    <td ><img style="width: 50px;height: 50px; margin-left: 10%;" src="dist/img/{{ $item->img }}" alt=""></td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td><img  style="width: 50px;height: 50px; margin-left: 10%;" src="https://api.qrserver.com/v1/create-qr-code/?data={{ $item->qrcode }}" /></td>
                  <td>
                    <form action="{{route('home')}}/Xoa" method="post">
                         @csrf 
                        <input type="hidden" name="ID_SP" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-sm btn-danger deleteCart"><i
                            class="fa fa-trash"></i> </button> </form>
                  </td>
                    </tr>
                    
                    @endforeach
            </tfoot>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{route('home')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{route('home')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{route('home')}}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{route('home')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="{{route('home')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{route('home')}}/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    });
    });
    </script>
    </body>
    </html>

@endsection