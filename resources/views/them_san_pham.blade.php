@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper sidebar-mini" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Thêm thông tin</h3>
              </div>
              <!-- /.card-header -->
              <!-- <div class="card-body"> -->
                <form id="form_input">
                   @csrf 
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="TenSP"
                        placeholder="Nhập tên sản phẩm" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Số lượng sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="SL"
                        placeholder="nhập số lượng sản phẩm" required>
                    </div>
    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Giá sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="Gia"
                        placeholder="nhập Giá sản phẩm" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Ảnh</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" onchange="readURL(this)">
                          <label class="custom-file-label" for="exampleInputFile" id="textchange" >Chọn ảnh</label>
                          <input type="hidden" name="Img" id="IMG" value="null">
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>
                   
                     
                        <div class="custom-file">
                          <input type="hidden" name="QR" value="<?php
                                
                                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                // Output: 54esmdr0qf
                                $i= substr(str_shuffle($permitted_chars), 0, 10);
                                echo $i;
                           ?>">
                        </div>
                  </div>
                  <!-- /.card-body -->
    
                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" id="gui" class="btn btn-primary">Thêm mới</button>
                  </div>
                </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
           
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-2">
            <!-- general form elements disabled -->
            <div class="row">
              <div class="card card-warning col-md-12">
                <div class="card-header">
                  <h3 class="card-title">Hình ảnh</h3>
                </div>
                <!-- /.card-header -->
                <!-- <div class="card-body"> -->
                  <div style="margin: 10%;" id="image">
                    <img  id="img-avatar" style="width: 200px;" src="dist/img/avatar04.png" alt="">
                  </div>
                  
              </div>
            </div>
            <div class="row">
              <div class="card card-warning col-md-12">
                <div class="card-header">
                  <h3 class="card-title">Mã QR</h3>
                </div>
                <!-- /.card-header -->
                <!-- <div class="card-body"> -->
                  <div style="margin: 10%;" id="QR">
                  <img  style="width: 200px;" src="https://api.qrserver.com/v1/create-qr-code/?data=<?php  echo $i; ?>" alt="" title="" />
                  
                  </div>
                  <button id="Print" type="button" style="display: none; margin-bottom: 5%" onclick="printDiv('QR')" class="btn btn-success">In mã QR</button>
                  {{-- <input id="Print" type="button" style="display: none;" onclick="printDiv('QR')" value="print a div!" /> --}}
              </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-avatar')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
  $(document).ready(function()
    { 
        var submit = $("#gui");
       
        submit.click(function()
        {
          var value = $( "#textchange" ).text();
          $( "input#IMG" ).val(value);
            //Lấy toàn bộ dữ liệu trong Form
            var data = $('form#form_input').serialize();
            $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            //Sử dụng phương thức Ajax.
            $.ajax({
                type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                url : 'AddProduct', //gửi dữ liệu sang trang data.php
                data : data, //dữ liệu sẽ được gửi
                success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                           
                               
                                
                                  alert(data)
                              
                                  $('#Print').show();
                                
                                // window.location.href = "https://www.google.com";
                            
                            }
                });
                return false;
            });
        });
</script>
<script>
  function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;
       var originalContents = document.body.innerHTML;
  
       document.body.innerHTML = printContents;
  
       window.print();
  
       document.body.innerHTML = originalContents;
       location.reload();
  }
</script>
<!-- jQuery -->
<script src="{{route('home')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{route('home')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{route('home')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="{{route('home')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{route('home')}}/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>


@endsection