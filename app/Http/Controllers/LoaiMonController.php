<?php

namespace App\Http\Controllers;

use App\Models\LoaiMon;
use App\Models\TheLoai;
use File;
use Illuminate\Http\Request;

class LoaiMonController extends Controller {
	public function __construct() {
		$this->theloai = TheLoai::all();
		$this->loaimon = LoaiMon::all();
	}
	public function getDanhSach() {
		$loaimon = $this->loaimon;
		$theloai = $this->theloai;
		return view('admin.loaimon.danhsach', compact('loaimon', 'theloai'));
	}
	public function suaLoaiMon($id) {
		$loaimon = loaimon::where('id', $id)->first();
		$theloai = $this->theloai;
		return view('admin.loaimon.sua', compact('loaimon', 'theloai'));
	}
	public function postSuaLoaiMon($id, Request $req) {
		$loaimon = LoaiMon::find($id);
		$anh = $loaimon->anh;
		if ($req->file('anh')) {
			File::delete($anh);
			$destinationPath = "uploads/loaimon";
			$file = $req->anh;
			$extension = $file->getClientOriginalExtension();
			$filename = $req->file('anh')->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$loaimon->anh = 'uploads/loaimon/' . $filename;
		}
		$loaimon->ten = $req->ten;
		$loaimon->id_theloai = $req->idtheloai;
		$loaimon->tenkhongdau = changeTitle($req->ten);
		$loaimon->save();
		return redirect()->route('danhSachLoaiMon')->with('thongbao', 'Sửa thành công');
	}
	public function getThemLoaiMon() {

		$theloai = $this->theloai;
		return view('admin.loaimon.them', compact('theloai'));
	}
	public function postThemLoaiMon(Request $req) {
		$errors = $this->validate($req,
			[
				'ten' => 'unique:LoaiMon',
			],
			[
				'ten' => "tên loại món này đã tồn tại",
			]);
		$loaimon = new loaimon();
		$loaimon->ten = $req->ten;
		$loaimon->tenkhongdau = changeTitle($req->ten);
		$loaimon->id_theloai = $req->idtheloai;
		if ($req->file('anh')) {
			$destinationPath = "uploads/loaimon";
			$file = $req->anh;
			$extension = $file->getClientOriginalExtension();
			$filename = $req->file('anh')->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$loaimon->anh = 'uploads/loaimon/' . $filename;
		}
		$loaimon->save();
		return redirect()->route('danhSachLoaiMon')->with('thongbao', 'Thêm thành công');
	}
	public function xoaLoaiMon($id) {
		$loaimon = loaimon::where('id', $id)->delete();
		return redirect()->back()->with('thongbao', 'Xoá thành công !!!');
	}

	public function rollBackAll() {
        return response()->json(null);
    }
}
