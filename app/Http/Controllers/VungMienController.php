<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VungMien;
use File;

class VungMienController extends Controller
{
   public function __construct(){
      $this->vungmien=VungMien::all();
   }
   public function getDanhSach(){
       $vungmien=VungMien::all();
       return view('admin.vungmien.danhsach',compact('vungmien'));
   }
   public function suaVungMien($id){
       $vungmien=VungMien::where('id',$id)->first();
       return view('admin.vungmien.sua',compact('vungmien'));
   }
   public function postSuaVungMien($id,Request $req){
       $vungmien=VungMien::find($id);
       $anh=$vungmien->anh;
       if ($req->file('anh')) {
            File::delete($anh);
            $destinationPath = "uploads/vungmien";
            $file = $req->anh;
            $extension = $file->getClientOriginalExtension();
            $filename = $req->file('anh')->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $vungmien->anh = 'uploads/vungmien/' . $filename;
        }
        $vungmien -> ten = $req->ten;
        $vungmien -> tenkhongdau = changeTitle($req->ten);
        $vungmien->vitri=$req->vitri;
        $vungmien->gioithieu=$req->gioithieu;
        $vungmien->save();
        return redirect()->route('danhSachVungMien')->with('thongbao','Sửa thành công');
    }
    public function postThemVungMien(Request $req){
        $errors=$this->validate($req,
            [
                'ten'=>'unique:VungMien'
            ],
            [
                'ten'=>"tên vùng miền này đã tồn tại"
            ]);
        $vungmien= new VungMien();
        $vungmien->ten=$req->ten;
        $vungmien->tenkhongdau=changeTitle($req->ten);
        $vungmien->vitri=$req->vitri;
        $vungmien->gioithieu=$req->gioithieu;
         if ($req->file('anh')) {
            $destinationPath="uploads/vungmien";
            $file=$req->anh;
            $extension=$file->getClientOriginalExtension();
            $filename= $req->file('anh')->getClientOriginalName();
            $file->move($destinationPath,$filename);
            $vungmien->anh='uploads/vungmien/'.$filename;
        }
        $vungmien->save();
        return redirect()->route('danhSachVungMien')->with('thongbao','Thêm thành công');
    }
    public function xoaVungMien($id){
            $vungmien= VungMien::where('id',$id)->delete();
            return redirect()->back()->with('thongbao','Xoá thành công !!!');
   }
}
