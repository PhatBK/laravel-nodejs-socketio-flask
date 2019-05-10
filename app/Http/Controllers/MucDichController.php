<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MucDich;
use File;

class MucDichController extends Controller
{
    public function __construct(){
//            $this->mucdich=MucDich::all();
    }
    public function getDanhSach(){
            $mucdich=MucDich::all();
            return view('admin.mucdich.danhsach',compact('mucdich'));
        }
    public function suaMucDich($id){
            $mucdich=MucDich::where('id',$id)->first();
            return view('admin.mucdich.sua',compact('mucdich'));
        }
    public function postSuaMucDich($id,Request $req){
            $mucdich=MucDich::find($id);
            $anh=$mucdich->anh;
            if ($req->file('anh')) {
                File::delete($anh);
                $destinationPath = "uploads/mucdich";
                $file = $req->anh;
                $extension = $file->getClientOriginalExtension();
                $filename = $req->file('anh')->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $mucdich->anh = 'uploads/mucdich/' . $filename;
            }
            $mucdich -> ten = $req->ten;
            $mucdich -> tenkhongdau = changeTitle($req->ten);
            $mucdich->save();
            return redirect()->route('danhSachMucDich')->with('thongbao','Sửa thành công');
        }
    public function postThemMucDich(Request $req){
            $errors=$this->validate($req,
                [
                    'ten'=>'unique:MucDich'
                ],
                [ 
                    'ten'=>"tên mục dích này đã tồn tại"
                ]);
            $mucdich= new MucDich();
            $mucdich->ten=$req->ten;
            $mucdich->tenkhongdau=changeTitle($req->ten);
            if ($req->file('anh')) {
                $destinationPath="uploads/mucdich";
                $file=$req->anh;
                $extension=$file->getClientOriginalExtension();
                $filename= $req->file('anh')->getClientOriginalName();
                $file->move($destinationPath,$filename);
                $mucdich->anh='uploads/mucdich/'.$filename;
            }
            $mucdich->save();
            return redirect()->route('danhSachMucDich')->with('thongbao','Thêm thành công');
    }
    public function xoaMucDich($id){
            $mucdich= MucDich::where('id',$id)->delete();
            return redirect()->back()->with('thongbao','Xoá thành công !!!');
    }

    public function rollBackAll() {
        return response()->json(null);
    }
}
