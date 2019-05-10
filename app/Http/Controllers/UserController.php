<?php

namespace App\Http\Controllers;

use App\Models\NhaHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

	public function getDanhSach() {
		$users = User::all();
		return view('admin.taikhoan.danhsach', ['users' => $users]);
	}
	public function getThem() {
		return view('admin.taikhoan.them');
	}
	public function postThem(Request $request) {

		$this->validate($request,
			[
				'tentaikhoan' => 'required|unique:users,tentaikhoan',
				'email' => 'required|email|unique:users,email',
				'password' => 'required|min:6|max:64',
				'passwordAgain' => 'required|same:password',
				'anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
			],
			[
				'tentaikhoan.required' => 'Error	: chư nhập tên tài khoản',
				'tentaikhoan.unique' => 'Error	: tên tài khoản đã tồn tại,nhập tên khác',
				'email.required' => 'Error : chưa nhập email',
				'email.email' => 'Error : chưa đúng định dạng email',
				'email.unique' => 'Error : email đã được đăng ký bởi người khác',
				'password.required' => 'Error : chưa nhập mật khẩu..',
				'passwordAgain.same' => 'Error: mật khẩu xác thực không đúng',
				'anh.required' => 'Error : chưa chọn ảnh đại diện',
				'anh.image' => 'Error	: ảnh đại diện không đúng đinh dạng ảnh',
				'anh.mimes' => 'Error : chọn file có đuôi: jpeg,png,jpg,gif,svg ',
				'anh.size' => 'Error	: dung lượng ảnh phải <= 4 Mb',
			]
		);

		$user = new User;
		$user->hovaten = $request->fullname;
		$gioitinh = $request->rdoGT;
		if ($gioitinh == 1) {
			$user->gioitinh = "Nam";
		} else if ($gioitinh == 2) {
			$user->gioitinh = "Nữ";
		} else {
			$user->gioitinh = "Không Xác Định";
		}
		$user->tuoi = $request->tuoi;
		$user->congviec = $request->congviec;
		$user->email = $request->email;
		$user->tentaikhoan = $request->tentaikhoan;
		$user->password = bcrypt($request->password);

		// Uploads file
		$file = $request->file('anh');
		$filename = $file->getClientOriginalName();
		$Hinh = str_random(4) . $filename;
		while (file_exists('uploads/customer/avatar/' . $Hinh)) {
			$Hinh = str_random(4) . $filename;
		}
		$file->move('uploads/customer/avatar', $Hinh);
		$user->anhdaidien = 'uploads/customer/avatar/' . $Hinh;
		// hết uploads file

		$user->noibat = $request->noibat;
		$user->level = $request->rdoUser;
		$user->save();
		return redirect('admin/user/danhsach')->with('thongbao', 'SUCCESS : thêm tài khoản thành công..');

	}
	public function getSua($id) {
		$user_online = Auth::user();
		$user = User::find($id);
		if ($user_online == $user) {
			return view('admin.taikhoan.sua', ['user' => $user]);
		} else {
			return redirect('admin/user/danhsach')->with('thongbaoloi', 'ERROR : không thể sửa tài khoản khác..');
		}
	}
	public function postSua(Request $request, $id) {
		$this->validate($request,
			[
				'tentaikhoan' => 'unique:users,tentaikhoan',
			],
			[
				'tentaikhoan.unique' => 'Error : chưa thay đổi tên tài khoản..',
			]
		);
		$user = User::find($id);
		$user->hovaten = $request->fullname;
		$gioitinh = $request->rdoGT;
		if ($gioitinh == 1) {
			$user->gioitinh = "Nam";
		} else if ($gioitinh == 2) {
			$user->gioitinh = "Nữ";
		} else {
			$user->gioitinh = "Không Xác Định";
		}
		$user->tuoi = $request->tuoi;
		$user->congviec = $request->congviec;
		$user->tentaikhoan = $request->tentaikhoan;
		$user->noibat = $request->noibat;
		if ($request->changePass == "on") {
			$this->validate($request, [
				'password' => 'required|min:8|max:64',
				'passwordAgain' => 'required|same:password',
			], [
				'password.required' => 'Error : chưa nhập mật khẩu mới..',
				'passwordAgain.required' => 'Error : chưa xác nhận mật khẩu mới..',
				'passwordAgain.same' => 'Error : mật khẩu xác nhận không đúng',
			]);
			$user->password = bcrypt($request->password);
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
			if ($user->avatar != null) {
				unlink($user->anhdaidien);
			}
			$file->move('uploads/customer/avatar', $Hinh);
			$user->anhdaidien = 'uploads/customer/avatar/' . $Hinh;
		}

		$user->save();
		return redirect('admin/user/danhsach')->with('thongbao', 'sửa thông tin thành công..');

	}
	public function getXoa($id) {
		$user_online = Auth::user();
		$user = User::find($id);

		if ($user_online->level == 0) {
			if ($user == $user_online) {
				return redirect('admin/user/danhsach')->with('thongbaoloi', 'ERROR : không thể xóa chính tài khoản của bạn...');
			} elseif ($user->level == 0) {
				return redirect('admin/user/danhsach')->with('thongbaoloi', 'ERROR : không thể xóa Super-admin khác...');
			} else {
				$user->delete();
				return redirect('admin/user/danhsach')->with('thongbao', 'SUCCESS : xóa tài khoản thành công..');
			}
		}
		if (($user_online->level == 1 && $user->level == 0) || ($user_online == $user) || ($user->level == 1)) {
			return redirect('admin/user/danhsach')->with('thongbaoloi', 'ERROR : không thể xóa : Super-admin,Admin khác và chính tài khoản của bạn..');
		}
		if ($user_online->level == 1 && $user->level == 2) {
			$user->delete();
			return redirect('admin/user/danhsach')->with('thongbao', 'SUCCESS : xóa thành công tài khoản..');
		}
	}
	public function getAdminLogin() {
		return view('admin.login');
	}
	public function postAdminLogin(Request $request) {

		if (Auth::attempt(['tentaikhoan' => $request->tentaikhoan,
			'password' => $request->password])) {
			return redirect('admin/info-page-admin')->with('thongbao', 'Success : Đăng nhập thành công,chào mừng tới trang quản trị.');
		} else {
			return redirect('admin/dangnhap')->with('thongbaoloi', 'ERROR : đăng nhập thất bại..,vui lòng thử lại !!');
		}
	}
	public function getAdminLogout() {
		Auth::logout();
		return redirect('admin/dangnhap')->with('dangxuat', 'đăng xuất thành công..đăng nhập để vào trang quản trị..');
	}
	//phần thêm tài khoản cho nhà hàng liên kết
	public function getDanhSachTaiKhoanNH() {
		$nhahangs = NhaHang::all();
		return view('admin.nhahang.danhsach', ['nhahangs' => $nhahangs]);
	}
	public function getThemTaiKhoanNH() {
		return view('admin.nhahang.them');
	}
	public function postThemTaiKhoanNH(Request $request) {
		$this->validate($request,
			[
				'fullname' => 'required|unique:nhahang,ten',
				'tendangnhap' => 'required|unique:nhahang,username',
			],
			[
				'fullname.required' => 'Error: chưa nhập tên nhà hàng..',
				'fullname.unique' => 'Error: tên nhà hàng đã tồn tại..',
				'tendangnhap.required' => 'Error: chưa nhập tên đăng nhập..',
				'tendangnhap.unique' => 'Error: chưa nhập tên đăng nhập đã tồn tại..',
			]
		);
		$nhahang = new NhaHang();
		$nhahang->ten = $request->fullname;
		$nhahang->tenkhongdau = changeTitle($request->fullname);
		$nhahang->username = $request->tendangnhap;
		$nhahang->password = bcrypt($request->password);
		$nhahang->luotxem = 0;
		$nhahang->noibat = 0;
		$nhahang->level = 3;
		$nhahang->lienhe = $request->lienhe;

		$nhahang->giomocua = $request->timeop;
		$nhahang->giodongcua = $request->timeclo;

		$nhahang->vitri = $request->vitri;
		$nhahang->gioithieu = $request->gioithieu;

		$file = $request->file('anh');
		$filename = $file->getClientOriginalName();
		$Hinh = str_random(4) . $filename;
		while (file_exists('uploads/customer/avatar/' . $Hinh)) {
			$Hinh = str_random(4) . $filename;
		}
		$file->move('uploads/customer/avatar', $Hinh);
		$nhahang->anh = 'uploads/customer/avatar/' . $Hinh;

		$nhahang->save();
		return redirect('admin/nhahang/danhsach')->with('thongbao', 'Success : thêm tài khoản nhà hàng liên kết thành công..');

	}
	public function getSuaThongTinNH($id) {
		$nhahang = NhaHang::find($id);
		return view('admin.nhahang.sua', ['nhahang' => $nhahang]);
	}
	public function postSuaThongTinNH(Request $request, $id) {
		$this->validate($request, [
			'fullname' => 'required',
			'tendangnhap' => 'required',
		], [
			'fullname.required' => 'Error : chưa nhập tên nhà hàng..',
			'tendangnhap.required' => 'Error : chưa nhập tên đăng nhập..',
		]);

		$nhahang = NhaHang::find($id);
		$nhahang->ten = $request->fullname;
		$nhahang->tenkhongdau = changeTitle($request->fullname);
		$nhahang->username = $request->tendangnhap;

		$nhahang->luotxem = 0;
		$nhahang->noibat = 0;
		$nhahang->level = 3;
		$nhahang->lienhe = $request->lienhe;

		$nhahang->giomocua = $request->timeop;
		$nhahang->giodongcua = $request->timeclo;

		$nhahang->vitri = $request->vitri;
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
		return redirect('admin/nhahang/danhsach')->with('thongbao', 'Success : sửa tài khoản nhà hàng liên kết thành công..');
	}
	public function getXemChiTiet($id) {
		$user = User::find($id);
		return view('admin.taikhoan.xemchitiet', ['user' => $user]);
	}
	public function getXoaTaiKhoanNH($id) {
		$nhahang = NhaHang::find($id);
		$nhahang->delete();
		return redirect('admin/nhahang/danhsach')->with('thongbao', 'Success : xóa tài khoản nhà hàng liên kết thành công...');
	}
    public function rollBackAll() {
        return response()->json("null");
    }
}
