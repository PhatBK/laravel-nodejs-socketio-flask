<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;
use File;
class TheLoaiController extends Controller {
	public function __construct() {
		$this->theloai = TheLoai::all();
	}
	public function getDanhSach() {
		$theloai = theloai::all();
		return view('admin.theloai.danhsach', compact('theloai'));
	}
	public function suaTheLoai($id) {
		$theloai = theloai::where('id', $id)->first();
		return view('admin.theloai.sua', compact('theloai'));
	}
	public function postSuaTheLoai($id, Request $req) {
		$theloai=TheLoai::find($id);
		$anh=$theloai->anh;
		if ($req->file('anh')) {
			File::delete($anh);
			$destinationPath = "uploads/theloai";
			$file = $req->anh;
			$extension = $file->getClientOriginalExtension();
			$filename = $req->file('anh')->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$theloai -> anh = 'uploads/theloai/' . $filename;
		}
		$theloai->ten = $req->ten;
		$theloai->tenkhongdau = changeTitle($req->ten);
		$theloai->save();
		return redirect()->route('danhSachTheLoai')->with('thongbao','Sửa thành công');
	}
	public function postThemTheLoai(Request $req) {
		$errors = $this->validate($req,
			[
				'ten' => 'unique:Theloai',
			],
			[
				'ten' => "tên thể loại này đã tồn tại",
			]);
		$theloai = new TheLoai();
		$theloai->ten = $req->ten;
		$theloai->tenkhongdau = changeTitle($req->ten);
		if ($req->file('anh')) {
			$destinationPath = "uploads/theloai";
			$file = $req->anh;
			$extension = $file->getClientOriginalExtension();
			$filename = $req->file('anh')->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$theloai->anh = 'uploads/theloai/' . $filename;
		} 
		$theloai->save();
		return redirect()->route('danhSachTheLoai')->with('thongbao','Thêm thành công');
	}
	public function xoaTheLoai($id) {
		$theloai = theloai::where('id', $id)->delete();
		return redirect()->back()->with('thongbao', 'Xoá thành công !!!');
	}
    public function rollBackAll() {
        return response()->json(null);
    }
}
