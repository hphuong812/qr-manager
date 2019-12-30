<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function Product(){
        return view('them_san_pham');
    }
    public function AddProduct(Request $request){
  
        $product = new Products;
        $product->product_name = $request->TenSP;
        $product->quantity= $request->SL ;
        $product->price =  $request->Gia ;
        $product->img =  $request->Img ;
        $product->qrcode =  $request->QR ;
        $product->save();
        if ($product) {
            return "thêm thành công";
        }else {
            return "Lỗi";
        }
    }
    public function DanhSachSP()
    {
       
       
               
                  // lấy tình trạng sản phẩm
                  $DanhSachSP= Products::all();
                // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";
                return view('danh_sach_san_pham',compact('DanhSachSP'));
            
        
                 
    }
    public function QuetSP()
    {
       
       
               
                  // lấy tình trạng sản phẩm
                  $DanhSachSP= Products::all();
                // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";
                return view('quet_san_pham',compact('DanhSachSP'));
            
        
                 
    }
    public function ScanQR(Request $request)
    {
        $DanhSachSP= Products::where('qrcode', $request->QRcode)->first();
        return $DanhSachSP;         
    }
}
