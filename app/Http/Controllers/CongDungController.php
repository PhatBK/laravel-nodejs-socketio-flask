<?php

namespace App\Http\Controllers;

use App\Models\CongDung;
use Illuminate\Http\Request;
use File;
class CongDungController extends Controller {
	public function __construct() {
		$this->congdung = CongDung::all();
	}

	public function getDanhSach() {
		$congdung = CongDung::all();
		return view('admin.congdung.danhsach', compact('congdung'));
	}
	public function suaCongDung($id) {
		$congdung = CongDung::where('id', $id)->first();
		return view('admin.congdung.sua', compact('congdung'));
	}
	public function postSuaCongDung($id, Request $req) {
		$congdung=CongDung::find($id);
		$anh=$congdung->anh;
		if ($req->file('anh')) {
			File::delete($anh);
			$destinationPath = "uploads/congdung";
			$file = $req->anh;
			$extension = $file->getClientOriginalExtension();
			$filename = $req->file('anh')->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$congdung -> anh = 'uploads/congdung/' . $filename;
		}
		$congdung -> ten = $req->ten;
		$congdung -> tenkhongdau = changeTitle($req->ten);
		$congdung->save();
		return redirect()->route('danhSachCongDung')->with('thongbao','Sửa thành công');
	}
	public function postThemCongDung(Request $req) {
		$this->validate($req,
			[
				'ten' => 'unique:CongDung',
			],
			[
				'ten' => "tên Công dụng này đã tồn tại",
			]);
		$congdung = new CongDung();
		$congdung->ten = $req->ten;
		$congdung->tenkhongdau = changeTitle($req->ten);
		if ($req->file('anh')) {
			$destinationPath = "uploads/congdung";
			$file = $req->anh;
			$extension = $file->getClientOriginalExtension();
			$filename = $req->file('anh')->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$congdung->anh = 'uploads/congdung/' . $filename;
		} 
		$congdung->save();
		return redirect()->route('danhSachCongDung')->with('thongbao','Thêm thành công');
	}
	public function xoaCongDung($id) {
		$congdung = CongDung::where('id', $id)->delete();
		return redirect()->back()->with('thongbao', 'Xoá thành công !!!');
	}

	public  function rollBackAll() {
        return response()->json(null);
    }
}
