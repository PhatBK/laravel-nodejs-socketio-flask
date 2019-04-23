<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class NhaHangLoginController extends Controller {
	public function __construct() {
		//sét cookei cho phiên của nhà hàng
		$this->middleware('guest:nhahang', ['except' => ['logout']]);
	}
	public function getlogin() {
		return view('auth.nhahang-login');
	}
	public function postlogin(Request $request) {
		// Validate the form data
		$this->validate($request, [
			'tentaikhoan' => 'required',
			'password' => 'required|min:8',
		]);
		// Attempt to log the user in
		if (auth()->guard('nhahang')->attempt(['username' => $request->tentaikhoan, 'password' => $request->password])) {
			// if successful, then redirect to their intended location
			return redirect()->intended(route('nhahang.thongtin'));
		}
		return redirect()->back()->withInput($request->only('tentaikhoan', 'remember'));
		// if unsuccessful, then redirect back to the login with the form data
		//return redirect()->back()->withInput($request->only('username', 'remember'));
	}
	public function logout() {
		Auth::guard('nhahang')->logout();
		//$request->session()->flush(); // If u flush all the sessions u gonna log out of all users 'admin and user here'
		//$request->session()->regenerate();
		return redirect('nhahang/login')->with('thongbao', 'Sucess : đăng xuất thành công..');
	}
}
