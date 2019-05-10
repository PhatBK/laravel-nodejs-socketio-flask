<?php

namespace App\Http\Controllers;

use App\Models\MonAn;
use App\Models\NhaHang;
use App\Models\NhaHangLienKet;
use App\Models\NhaHangMonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhaHangController extends Controller {
	public function __construct() {
		$this->middleware('auth:nhahang');
	}
	public function index() {
		return view('nhahang.thongtin');
	}
	public function getNhaHangLayThongTin() {
		$menu_old = NhaHangLienKet::all();
		return view('nhahang.thongtin');
	}
	public function getDanhSachMonAn() {
		$nhahang_online = Auth::guard('nhahang')->user();
		$nhahangmonans = $nhahang_online->nhahangmonan;
		return view('nhahang.danhsach', ['nhahangmonans' => $nhahangmonans]);
	}
	public function getTuThemMonAn() {
		return view('nhahang.tu_them');
	}
	public function postTuThemMonAn(Request $request) {
		$this->validate($request,
			[
				'tenmon' => 'required|unique:nhahangmonan,tenmon',
				'anh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
			],
			[
				'tenmon.required' => 'Error : chưa nhập tên món ăn..',
				'tenmon.unique' => 'Error : món ăn đã tồn tại ..',
				'anh.image' => 'Error	: ảnh đại diện không đúng đinh dạng ảnh',
				'anh.mimes' => 'Error : chọn file có đuôi: jpeg,png,jpg,gif,svg ',
				'anh.size' => 'Error	: dung lượng ảnh phải <= 4 Mb',
			]
		);
		$monan = new NhaHangMonAn;
		$monan->id = rand(1, 100000);
		$monan->tenmon = $request->tenmon;
		$monan->gia = $request->gia;
		$monan->khuyenmai = $request->khuyenmai;
		$monan->noidung = $request->noidung;
		// Uploads file
		$file = $request->file('anh');
		$filename = $file->getClientOriginalName();
		$Hinh = str_random(4) . $filename;
		while (file_exists('uploads/nhahang/' . $Hinh)) {
			$Hinh = str_random(4) . $filename;
		}
		$file->move('uploads/nhahang', $Hinh);
		$monan->image = 'uploads/nhahang/' . $Hinh;
		// hết uploads file
		$monan->id_nhahang = Auth::guard('nhahang')->user()->id;
		$monan->save();

		return redirect('nhahang/danhsachmonan')->with('thongbao', 'Sucess : thêm món ăn thành công..');
	}
	public function getSuaMonAn($id) {
		$monan = NhaHangMonAn::find($id);
		return view('nhahang.suamonan', ['monan' => $monan]);
	}
	public function postSuaMonAn(Request $request, $id) {
		$monan = NhaHangMonAn::find($id);
		$monan->tenmon = $request->tenmon;
		$monan->gia = $request->gia;
		$monan->khuyenmai = $request->khuyenmai;
		$monan->noidung = $request->noidung;

		if ($request->hasFile('anh')) {
			$this->validate($request, [
				'anh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',

			], [
				'anh.image' => 'Error	: ảnh đại diện không đúng đinh dạng ảnh',
				'anh.mimes' => 'Error : chọn file có đuôi: jpeg,png,jpg,gif,svg ',
				'anh.size' => 'Error	: dung lượng ảnh phải <= 4 Mb',
			]);

			$file = $request->file('anh');
			$filename = $file->getClientOriginalName();
			$Hinh = str_random(4) . $filename;
			while (file_exists('uploads/nhahang/' . $Hinh)) {
				$Hinh = str_random(4) . $filename;
			}
			if ($monan->image != null) {
				unlink($monan->image);
			}
			$file->move('uploads/nhahang', $Hinh);
			$monan->image = 'uploads/nhahang/' . $Hinh;
		}
		$monan->save();
		return redirect('nhahang/danhsachmonan')->with('thongbao', 'Sucess: sửa món ăn thành công..');
	}
	public function getXoaMonAn($id) {
		$monan = NhaHangMonAn::find($id);
		$monan->delete();
		return redirect('nhahang/danhsachmonan')->with('thongbao', 'Sucess: xóa món ăn thành công..');
	}
	//phần mở rộng có thể làm thêm
	public function getThemMonDanhSach() {
		$monans = MonAn::all();
		return view('nhahang.danhsach_them', ['monans' => $monans]);
	}
	public function postThemMonDanhSach() {
		$monans = MonAn::all();
	}
	//phần sửa thông tin nhà hàng
	public function getSuaThongTin() {
		$id = Auth::guard('nhahang')->user()->id;
	}
	public function postSuaThongTin(Request $request) {

		$id = Auth::guard('nhahang')->user()->id;
		$nhahang = NhaHang::find($id);
		$nhahang->ten = $request->fullname;
		$nhahang->tenkhongdau = changeTitle($request->fullname);
		$nhahang->username = $request->tendangnhap;
		$nhahang->lienhe = $request->lienhe;
		$nhahang->vitri = $request->vitri;
		$nhahang->giomocua = $request->timeop;
		$nhahang->giodongcua = $request->timeclo;
		$nhahang->gioithieu = $request->gioithieu;
		if ($request->changePass == "on") {
			$this->validate($request, [
				'password' => 'required|min:8|max:64',
				'passwordAgain' => 'required|same:password',
			], [
				'password.required' => 'Error : chưa nhập mật khẩu mới..',
				'passwordAgain.required' => 'Error : chưa xác nhận mật khẩu mới..',
				'passwordAgain.same' => 'Error : mật khẩu xác nhận không đúng',
			]);
			$nhahang->password = bcrypt($request->password);
		}
		if ($request->hasFile('anh')) {
			$this->validate($request, [
				'anh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',

			], [
				'anh.image' => 'Error	: ảnh đại diện không đúng đinh dạng ảnh',
				'anh.mimes' => 'Error : chọn file có đuôi: jpeg,png,jpg,gif,svg ',
				'anh.size' => 'Error	: dung lượng ảnh phải <= 4 Mb',
			]);

			$file = $request->file('anh');
			$filename = $file->getClientOriginalName();
			$Hinh = str_random(4) . $filename;
			while (file_exists('uploads/customer/avatar/' . $Hinh)) {
				$Hinh = str_random(4) . $filename;
			}
			if ($nhahang->anh != null) {
				unlink($nhahang->anh);
			}
			$file->move('uploads/customer/avatar', $Hinh);
			$nhahang->anh = 'uploads/customer/avatar/' . $Hinh;
		}

		$nhahang->save();
		return redirect('nhahang/thongtin')->with('thongbao', 'Success : sửa tài khoản nhà hàng liên kết thành công..');
	}

    public function rollBackAll() {
        return response()->json(null);
    }
}
