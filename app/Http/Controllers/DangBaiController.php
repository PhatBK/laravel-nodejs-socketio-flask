<?php

namespace App\Http\Controllers;

use App\Models\CommentPost;
use App\Models\LikePost;
use App\Models\LoaiMon;
use App\Models\MonAn;
use App\Models\ReportCommentPost;
use App\Models\TheLoai;
use App\Models\UserPost;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangBaiController extends Controller {

	public function getBaiVietLienQuan($id_monan) {
		$monan = MonAn::where('id', $id_monan)->value('id_loaimon');
		$bv_lienquan = UserPost::where('id_loaimon', $monan)->get();
		$ma = MonAn::where('id', $id_monan)->first();
		return view('admin.monan.baivietlienquan', compact('bv_lienquan', 'ma'));
	}

	public function xoaBaiVietLienQuan($id, $id_monan) {
		$monan = MonAn::where('id', $id_monan)->first();
		$bv_lienquan = UserPost::find($id);
		$bv_lienquan->delete();
		return redirect()->route('baiVietLienQuan', $monan->id)->with('xoabaivietthanhcong', 'Đã Xóa Bài Viết Thành Công!');
	}
	public function getDanhSach() {
		$baiviets = UserPost::all();
		return view('admin.baiviet.danhsach', ['baiviets' => $baiviets]);
	}
	public function getXemChiTiet($id) {
		$baiviet = UserPost::find($id);
		$comments = $baiviet->commentpost;
		//dd(count($comments));
		$report_comments = array();
		for ($i = 0; $i < count($comments); $i++) {
			$report_comments[] = $comments[$i]->reportcommentpost;
		}
		//dd($report_comments);
		return view('admin.baiviet.chitiet',
			['baiviet' => $baiviet,
				'comments' => $comments,
				'report_comments' => $report_comments,
			]);
	}
	public function getXoaBaiViet($id) {
		$baiviet = UserPost::find($id);
		$baiviet->delete();
		return redirect('admin/baiviet/danhsach')->with('thongbao', 'Sucess : xóa bài viết thành công...');
	}
	public function getXoaComment($id, $idb) {
		$comment = CommentPost::find($id);
		$comment->delete();
		return redirect('admin/baiviet/xemchitiet/' . $idb)->with('thongbao', 'Sucess : xóa comment bài viết thành công');
	}

	public function loadDangBai() {
		$food_category = TheLoai::all();
		$user_posts = UserPost::orderBy('created_at', 'desc')->limit(10)->get();
		$top10_users = DB::table('users')->orderBy('noibat', 'desc')->limit(10)->get();

		return view('customer.dangbai', compact('food_category', 'user_posts', 'top10_users'));
	}

	public function findLoaiMon(Request $request) {
		$data = LoaiMon::select('id', 'ten')->where('id_theloai', $request->id)->take(100)->get();
		return response()->json($data);
	}
	public function checklike(Request $request) {
		$baiviet = UserPost::find($id);
	}

	public function loadthembaiviet(Request $request) {
		$offset = $request->offset;
		$userposts = UserPost::orderBy('created_at', 'desc')->offset($offset)->limit(10)->get();
		$arr_result = array();
		array_push($arr_result, Auth::user());
		foreach ($userposts as $userpost) {
			$commentposts = $userpost->commentpost;
			$likeposts = $userpost->likepost;
			$user = $userpost->user;
			$postimages = $userpost->postimage;
			foreach ($commentposts as $commentpost) {
				$user_commentpost = $commentpost->user;
				$reportcommentposts = $commentpost->reportcommentpost;
				foreach ($reportcommentposts as $reportcommentpost) {
					$user_reportcommentpost = $reportcommentpost->user;
				}
			}
			$element = [];
			$element['userpost'] = $userpost;
			$element['like'] = 0;
			if (Auth::user()) {
				foreach ($likeposts as $likepost) {
					if ($likepost->user->id == Auth::user()->id) {
						$element['like'] = 1;
						break;
					}
				}
			}
			array_push($arr_result, $element);
		}
		return response()->json($arr_result);
	}

	public function baidangchitiet($id) {
		$user_post = UserPost::find($id);
		$top10_users = DB::table('users')->orderBy('noibat', 'desc')->limit(10)->get();
		return view('customer.baidangchitiet', compact('user_post', 'top10_users'));
	}

	public function rollBackAll() {

    }
}
