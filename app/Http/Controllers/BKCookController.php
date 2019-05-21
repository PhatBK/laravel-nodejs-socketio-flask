<?php

namespace App\Http\Controllers;

use App\Models\CacBuocNau;
use App\Models\CongDung;
use App\Models\DanhGiaMonAn;
use App\Models\FeedBack;
use App\Models\LikeMonAn;
use App\Models\LoaiMon;
use App\Models\MonAn;
use App\Models\MucDich;
use App\Models\NhaHang;
use App\Models\NhaHangMonAn;
use App\Models\Theloai;
use App\Models\User;
use App\Models\UserPost;
use App\Models\Video;
use App\Models\VungMien;
use App\Models\UserServey;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class BKCookController extends Controller {
	public $protein;
	public $lipit;
	public $gluxit;
	public $count_survey = 0;

	function __construct() {
        $this->count_survey += 1;
		$foods = count(MonAn::all());
		$users = count(User::all());
		$nhahangs = count(NhaHang::all());
		$videos = count(Video::all());
		$baiviets = count(UserPost::all());
        $loaimons = LoaiMon::all();

        $timeout_survey = 0.5 * 60 * 1000; // 30 giây

		view()->share('foods', $foods);
		view()->share('users', $users);
		view()->share('nhahangs', $nhahangs);
		view()->share('videos', $videos);
		view()->share('baiviets', $baiviets);
        view()->share('loaimons', $loaimons);
        view()->share('timeout_survey', $timeout_survey);
        view()->share('count_survey', $this->count_survey);

	}
	public function trangchu() {
        $this->count_survey += 1;

		$monan = MonAn::take(12)->get();
		$nhahang = NhaHang::take(3)->get();
		$topthanhvien = User::orderBy('noibat', 'desc')->take(5)->get();
		return view('customer.trangchu', compact('monan', 'nhahang', 'topthanhvien'));
	}
	// món ăn
	public function getMonAn() {
        $this->count_survey += 1;
		$monans = MonAn::paginate(8);
		return view('customer.monan', ['monans' => $monans]);
	}
	// Paginate sử dụng Ajax
	public function getPaginateAjax(Request $request) {
		$monans = MonAn::paginate(8);
		if ($request->ajax()) {
			return view('customer.monan', ['monans' => $monans])->render();
		} else {
			return view('customer.monan', ['monans' => $monans]);
		}

	}
	//thể loại
	public function View_theloai() {
        $this->count_survey += 1;
		return view('customer.chitiettheloai');
	}
	//chi tiet loaimon
	public function View_loaimon() {
        $this->count_survey += 1;
		$theloai = TheLoai::all();
		$loaimon = LoaiMon::all();
		$monan = MonAn::take(8)->get();
		return view('customer.chitietloaimon', compact('loaimon', 'theloai', 'monan'));
	}
	// loai mon
	public function View_monans_by_id_loaimon(Request $req) {
		if (is_array($req->ids)) {
			$id_loaimons = $req->ids;
			$length = count($id_loaimons);
			$monan = [];
			for ($i = 0; $i < $length; $i++) {
				$mn = MonAn::where('id_loaimon', $id_loaimons[$i])->get();
				for ($j = 0; $j < count($mn); $j++) {
					array_push($monan, $mn[$j]);
				}
			}
			return response()->json($monan);
		} else {
			$monan = MonAn::take(8)->get();
			return response()->json($monan);
		}
	}
	//chi tiet congdung
	public function View_congdung() {
        $this->count_survey += 1;
		$congdung = CongDung::all();
		$monan = MonAn::take(8)->get();
		return view('customer.chitietcongdung', compact('congdung', 'monan'));
	}
	public function View_monans_by_id_congdung(Request $req) {
		if (is_array($req->ids)) {
			$id_congdungs = $req->ids;
			$length = count($id_congdungs);
			$monan = [];
			for ($i = 0; $i < $length; $i++) {
				$mn = MonAn::where('id_congdung', $id_congdungs[$i])->get();
				for ($j = 0; $j < count($mn); $j++) {
					array_push($monan, $mn[$j]);
				}
			}
			return response()->json($monan);
		} else {
			$monan = MonAn::take(8)->get();
			return response()->json($monan);
		}
	}
	//chi tiet vungmien
	public function View_vungmien() {
        $this->count_survey += 1;
		$vungmien = VungMien::all();
		$monan = MonAn::take(8)->get();
		return view('customer.chitietvungmien', compact('vungmien', 'monan'));
	}
	public function View_monans_by_id_vungmien(Request $req) {
		if (is_array($req->ids)) {
			$id_vungmiens = $req->ids;
			$length = count($id_vungmiens);
			$monan = [];
			for ($i = 0; $i < $length; $i++) {
				$mn = MonAn::where('id_vungmien', $id_vungmiens[$i])->get();
				for ($j = 0; $j < count($mn); $j++) {
					array_push($monan, $mn[$j]);
				}
			}
			return response()->json($monan);
		} else {
			$monan = MonAn::take(8)->get();
			return response()->json($monan);
		}
	}
	//chi tiet nhahang
	public function View_nhahang() {
		$nhahang = NhaHang::all();
		$monan = NhaHangMonAn::take(8)->get();
		return view('customer.chitietnhahang', compact('nhahang', 'monan'));
	}
	public function View_monans_by_id_nhahang(Request $req) {
		if (is_array($req->ids)) {
			$id_nhahangs = $req->ids;
			$length = count($id_nhahangs);
			$monan = [];
			for ($i = 0; $i < $length; $i++) {
				$mn = NhaHangMonAn::where('id_nhahang', $id_nhahangs[$i])->take(8)->get();
				for ($j = 0; $j < count($mn); $j++) {
					array_push($monan, $mn[$j]);
				}
			}
			return response()->json($monan);
		} else {
			$monan = NhaHangMonAn::take(8)->get();
			return response()->json($monan);
		}
	}
	//chi tiet muc dich
	public function View_mucdich() {
        $this->count_survey += 1;
		$mucdich = MucDich::all();
		$monan = MonAn::take(8)->get();
		return view('customer.chitietmucdich', compact('mucdich', 'monan'));
	}
	public function View_monans_by_id_mucdich(Request $req) {
		if (is_array($req->ids)) {
			$id_mucdichs = $req->ids;
			$length = count($id_mucdichs);
			$monan = [];
			for ($i = 0; $i < $length; $i++) {
				$mn = MonAn::where('id_mucdich', $id_mucdichs[$i])->get();
				for ($j = 0; $j < count($mn); $j++) {
					array_push($monan, $mn[$j]);
				}
			}
			return response()->json($monan);
		} else {
			$monan = MonAn::take(8)->get();
			return response()->json($monan);
		}
	}
	// xem chi tiết một món ăn hệ thống
	public function View_chitietmonan($id) {
        $this->count_survey += 1;
		$timeout_request_recommend = 1 * 60 * 1000; // 1 phút

		if (isset($id)) {
			$monan = MonAn::find($id);
			if (!(Session::get('id') == $id)) {
				$monan->so_luot_xem++;
				$monan->save();
				Session::put('id', $id);
			}
			$baiviet_lienquans = UserPost::where('id_loaimon', $monan->id_loaimon)->orderBy('created_at', 'desc')->take(5)->get();
			$monan_lienquan_loaimon = MonAn::where('id_loaimon', $monan->id_loaimon)->orderBy('id', 'desc')->take(7)->get();

            $loai_mon_surveys = [];
            $monan_loai_mon_surveys = [];
//            if (Auth::user()) {
//                $surveys = explode("|", UserServey::where('user_id', Auth::user()->id)->get()[0]->loaimon_lists);
//                if (count($surveys) >= 2) {
//                    $index =  rand(0, count($surveys));
//                    $index1 = rand(0, count($surveys));
//                    while (true) {
//                        if ($index == $index1) {
//                            $index1 = rand(0, count($surveys));
//                        } else {
//                            break;
//                        }
//                    };
//                    $loai_mon_surveys[] = $surveys[$index];
//                    $loai_mon_surveys[] = $surveys[$index1];
//
//                    $monan_loai_mon_surveys[] = MonAn::where('id_loaimon', $loai_mon_surveys[0])->orderBy('id', 'desc')->take(5)->get();
//                    $monan_loai_mon_surveys[] = MonAn::where('id_loaimon', $loai_mon_surveys[1])->orderBy('id', 'asc')->take(5)->get();
//                }
//            }
            // Lấy ra các món ăn phổ biến nhất, các món ăn mới nhất
			$new_last_foods = MonAn::orderBy('created_at', 'desc')->take(5)->get();
            $popularest_foods = MonAn::orderBy('so_luot_xem', 'desc')->take(5)->get();
			$monan_lienquan = collect($monan_lienquan_loaimon)->unique();
			$cacbuocnau = CacBuocNau::where('id_monan', $id)->get();
            $comments = $monan->comment;
            $danhgias = $monan->danhgiamonan;
			$diem = 0;
			$trungbinh = 0;
			foreach ($danhgias as $dg) {
				$diem += $dg->danhgia;
			}
			if (count($monan->danhgiamonan) > 0) {
				$trungbinh = number_format($diem / (count($monan->danhgiamonan)), 1, '.', '');
			} else {
				$trungbinh = 0;
			}
			// Lấy dữ liệu món ăn được gợi ý từ recommendation engine
            $recommendation_list = [];
            return view('customer.chitietmonan',
                compact(
                    'monan',
                    'monan_lienquan',
                    'cacbuocnau',
                    'baiviet_lienquans',
                    'comments',
                    'trungbinh',
                    'popularest_foods',
					'new_last_foods',
					'timeout_request_recommend'
                )
            );
		} else {
			return view('customer.trangchu');
		}
	}
	// chitiết món ăn nhà hàng
	public function View_chitietmonannhahang($id) {
		if (isset($id)) {
			$monan = NhaHangMonAn::find($id);
			$cungnhahangs = NhaHangMonAn::where('id_nhahang', $monan->id_nhahang)->orderBy('id', 'desc')->get();
			$nhahang = NhaHang::find($monan->id_nhahang);
			if (!(Session::get('id') == $id)) {
				$nhahang->luotxem++;
				$monan->luotxem++;
				$nhahang->save();
				$monan->save();
				Session::put('id', $id);
			}
			return view('customer.monannhahangchitiet', compact('monan', 'cungnhahangs'));
		} else {
			return view('customer.chitietnhahang');
		}
	}
	// lấy tốp thành viên
	public function getTopUser() {
		$topusers = User::orderBy('master', 'desc')->take(5)->get();
		return view('trangchu', ['topusers' => $topusers]);
	}
	// đăng ký tài khoản
	public function postDangKy(Request $request) {
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

		$user->noibat = 0;
		$user->level = 2;
		$user->save();
		return redirect()->back()->with('thongbao_register', "Đăng ký tài khoản thành công...");
	}
	//post sửa tài khoản
	public function postSuaTaiKhoan(Request $request) {
		if ($request->changeInfo == "on") {
			$id = Auth::user()->id;
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
			$tb = "alert(`SUCCESS : sửa tài khoản thành công.. ahihi`);";
			return redirect()->back()->with('thongbao', $tb);

		} else {
			$tb = "alert(`Warning : bạn không sửa thông tin nào cả...`);";
			return redirect()->back()->withErrors("Bạn không sửa thông tin nào cả..");
		}
	}
	// đăng nhập cho tất cả
	public function postDangNhap(Request $request) {

		if (Auth::attempt(['tentaikhoan' => $request->username,
			'password' => $request->password])) {
			$tb = "Đăng nhập thành công.. ahihi";
			return redirect()->back()->with('thongbao_login_true', $tb);
		} elseif (auth()->guard('nhahang')->attempt(['username' => $request->username, 'password' => $request->password])) {
			$tb = "Đăng nhập thành công.. ahihi";
			return redirect()->back()->with('thongbao', $tb);
		} else {
			$tb = "Đăng nhập thất bại...ahihi";
			return redirect()->back()->withErrors("Đăng nhập thất bại..(sai username hoạc pass)");
		}
	}
	// đăng xuất cho tất cả
	public function getDangXuat(Request $request) {
		if (Auth::guard('nhahang')->user()) {
			Auth::guard('nhahang')->logout();
			Session::flush();
			$tb = "Đăng xuất thành công.. ahihi";
            $request->session()->flush();
            $request->session()->regenerate();

			return redirect()->back()->with('thongbao_logout_true', $tb);
		}
		if (Auth::user()) {
			Auth::logout();
			Session::flush();
			$tb = "Đăng xuất thành công.. ahihi";
            $request->session()->flush();
            $request->session()->regenerate();

			return redirect()->back()->with('thongbao_logout_true', $tb);;
		}
	}
	//tim kiem monan
	public function timkiem_monan(Request $req) {
		$link = $req->link;
		$key = $req->key;

		if (isset($key)) {
			if ($link === "trangchu") {
				$data = [];
				$data = MonAn::where('ten_monan', $key)
				->orwhere('ten_monan', 'like', '%' . $key . '%')
				->orwhere('nguyen_lieu_chinh', 'like', '%' . $key . '%')
				->get();
				if ($data == null) {
					$data = LoaiMon::where('ten', $key)
					->orwhere('ten', 'like', '%' . $key . '%')
					->orwhere('tenkhongdau', 'like', '%' . $key . '%')->get();
				}
				return response()->json($data);
			} else if ($link === "loaimon") {
				$data = [];
				$loaimon = LoaiMon::where('ten', $key)->orwhere('ten', 'like', '%' . $key . '%')->get();
				if (isset($loaimon)) {
					foreach ($loaimon as $lm) {
						$monan = MonAn::where('id_loaimon', $lm->id)->get();
						for ($j = 0; $j < count($monan); $j++) {
							array_push($data, $monan[$j]);
						}
					}
					if (!empty($data)) {
						return response()->json($data);
					}
				}
			} else if ($link === "mucdich") {
				$data = [];
				$mucdich = MucDich::where('ten', $key)->orwhere('ten', 'like', '%' . $key . '%')->get();
				if (isset($mucdich)) {
					foreach ($mucdich as $lm) {
						$monan = MonAn::where('id_mucdich', $lm->id)->get();
						for ($j = 0; $j < count($monan); $j++) {
							array_push($data, $monan[$j]);
						}
					}
					if (!empty($data)) {
						return response()->json($data);
					}
				}
			} else if ($link === "congdung") {
				$data = [];
				$congdung = CongDung::where('ten', $key)->orwhere('ten', 'like', '%' . $key . '%')->get();
				if (isset($congdung)) {
					foreach ($congdung as $lm) {
						$monan = MonAn::where('id_congdung', $lm->id)->get();
						for ($j = 0; $j < count($monan); $j++) {
							array_push($data, $monan[$j]);
						}
					}
					if (!empty($data)) {
						return response()->json($data);
					}
				}
			} else if ($link === "vungmien") {
				$data = [];
				$vungmien = VungMien::where('ten', $key)->orwhere('ten', 'like', '%' . $key . '%')->get();
				if (isset($vungmien)) {
					foreach ($vungmien as $lm) {
						$monan = MonAn::where('id_vungmien', $lm->id)->get();
						for ($j = 0; $j < count($monan); $j++) {
							array_push($data, $monan[$j]);
						}
					}
					if (!empty($data)) {
						return response()->json($data);
					}
				}
			} else if ($link === "nhahang") {
				$data = [];
				$nhahang = NhaHang::where('ten', $key)->orwhere('ten', 'like', '%' . $key . '%')->get();
				if (isset($nhahang)) {
					foreach ($nhahang as $lm) {
						$monan = NhaHangMonAn::where('id_nhahang', $lm->id)->get();
						for ($j = 0; $j < count($monan); $j++) {
							array_push($data, $monan[$j]);
						}
					}
					return response()->json($data);
				}
			} else if ($link === "dangbai") {
				$data = [];
				$data = MonAn::where('ten_monan', $key)->orwhere('ten_monan', 'like', '%' . $key . '%')->get();
				return response()->json($data);
			}
			$data = [];
			$data = MonAn::where('ten_monan', $key)->orwhere('ten_monan', 'like', '%' . $key . '%')->get();
			return response()->json($data);
		} else {
			response()->json("lỗi gì đó lookup");
		}
	}
	// đánh giá món ăn
	public function danhgia_monan(Request $request) {
		$monan = MonAn::find($request->moni);
		$count_old = count($monan->danhgiamonan);

		$id_monan = $request->moni;
		$id_user = $request->useri;
		$sosao = $request->saoi;
		$danhgia = new DanhGiaMonAn;
		$danhgia->id_user = $id_user;
		$danhgia->id_monan = $id_monan;
		$danhgia->danhgia = $sosao;
		$danhgia->save();

		$total = 0;
		$monan_ = MonAn::find($request->moni);
		$all_danhgias = $monan_->danhgiamonan;
		$count_dg = count($all_danhgias);
		foreach($all_danhgias as $dg) {
			$total += $dg->danhgia;
		}
		$responses = [
			'total' => $total,
			'count_dg' => $count_dg,
			'count_old' => $count_old,
			'current' => $sosao
		];
        return response()->json($responses);
	}
    //	like món ăn
	public function like_monan(Request $request) {

	}
    //	lấy comment của bài đăng
	public function getCommentPost() {
		$posts = UserPost::all();
		$commentposts = [];
		$report_comment_posts = [];
		foreach ($posts as $post) {
			array_push($commentposts, $post->commentpost);
			foreach ($post->commentpost as $comment) {
				array_push($report_comment_posts, $comment->reportcommentpost);
			}
		}
	}
    //	hoàn thành lưu lại khảo sát của người dùng
	public function postUserSurvey(Request $req) {
	    $user_survey = new UserServey();
        $user_survey->user_id = Auth::user()->id;
        $lists = '';
        $i = 0;
        $length_list = count($req->loaimons_checked);
        foreach ($req->loaimons_checked as $lm_checked) {
            $i++;
            $lists .= strval($lm_checked);
            if ($i < $length_list) {
                $lists .= "|";
            }
        }
        $user_survey->loaimon_lists = $lists;
        $user_survey->save();
		$response = explode("|", UserServey::where('user_id', Auth::user()->id)->get()[0]->loaimon_lists);
		return response()->json($response);
	}
	// hoàn thành lưu lại feedback
	public function postFeedBack(Request $req) {
        $feedback = new FeedBack();
        $user_id_ = $req->user_id;
        if (Auth::user()) {
            $user_id_ = Auth::user()->id;
        } else {
            $user_id_ = $req->user_id;
        }
        $feedback->id_user = $user_id_;
        $feedback->title = $req->title;
        $feedback->content = $req->content_;
        $feedback->save();
		return response()->json(
            "<p style='color: orangered; font-size: 18px;'>Phản hồi của bạn đã được ghi lại</p>
                   <p style='color: orangered; font-size: 18px;'>Bộ phận quản trị hệ thống sẽ tiếp nhận phản hồi</p>
                   <p style='color: orangered; font-size: 18px;'>Chúc bạn một ngày vui vẻ...</p>
                   "
        );
	}
	public function postUserViewedList() {
	    $viewedlist = "";
	    return response()->json("");
    }
    // lưu lại danh sách yêu thích của ngườu dùng
    public function postUserLikeMonAn(Request $req) {
        if ($req->id_mon && $req->id_user) {
//            $like_monan = LikeMonAn::firstOrCreate(['id_user' => $req->id_user, 'id_monan' => $req->id_mon]);
            $like_mon = new LikeMonAn();
            $like_mon->id_user = $req->id_user;
            $like_mon->id_monan = $req->id_mon;
            $like_mon->save();
            if ( $like_mon->save()) {
                return response()->json("Success save user like monan");
            } else {
                return response()->json("Unsuccess save data, Unique data");
            }
        } else {
            return response()->json("Data not validate...");
        }
    }
    public  function getChannelView() {
	    return view('channel.index');
    }
}
