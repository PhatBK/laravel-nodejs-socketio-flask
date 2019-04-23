<?php

namespace App\Http\Controllers;
use App\Models\CommentMonAn;
use App\Models\CommentPost;
use App\Models\LikePost;
use App\Models\PostImage;
use App\Models\ReportCommentPost;
use App\Models\UserPost;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller {

	public function savedatauserpost(Request $request) {
		$id_userpost = rand(10000000, 99999999);
		$array = $request->all();
		foreach ($array as $value) {
			$element = json_decode($value, true);
			$userpost = new UserPost;

			$userpost->id = $id_userpost;
			$userpost->tieude = $element['tieude'];
			$userpost->noidung = $element['noi_dung'];
			$userpost->soluotxem = 0;
			$userpost->soluotthich = 0;
			$userpost->soluong_comment = 0;
			$userpost->id_loaimon = $element['id_loaimon'];
			$userpost->id_user = $element['id_user'];
			$list_name_image = $element['list_name_image'];
			$userpost->save();

			foreach ($list_name_image as $ele) {
				$postimage = new PostImage;
				$postimage->image = $ele;
				$postimage->id_post = $id_userpost;
				$postimage->save();
			}

			DB::table('users')->where('id', '=', $element['id_user'])->increment('noibat', 5);
			$user = DB::table('users')->where('id', '=', $element['id_user'])->first();

			$list_detail['tieude'] = $element['tieude'];
			$list_detail['noi_dung'] = $element['noi_dung'];
			$list_detail['id_loaimon'] = $element['id_loaimon'];
			$list_detail['id_user'] = $element['id_user'];
			$list_detail['id_userpost'] = $id_userpost;
			$list_detail['list_name_image'] = $element['list_name_image'];
			$list_detail['anh_dai_dien'] = $user->anhdaidien;
			$list_detail['ten_tai_khoan'] = $user->tentaikhoan;
			$list_detail['noi_bat'] = $user->noibat;
			$list_detail['created_at'] = $user->created_at;
			$list_detail['like'] = 0;
			$list_detail['comment'] = 0;
			$list_detail['view'] = 0;

		}
		// trả lại bài viết mới đăng của một user
		// dưới dạng json
		return response()->json($list_detail);
	}

	public function savedatacommentpost(Request $request) {

		$array = $request->all();
		foreach ($array as $value) {
			$element = json_decode($value, true);
			$commentpost = new CommentPost;
			$commentpost->id_user = $element['id_user'];
			$commentpost->id_UserPost = $element['id_userpost'];
			$commentpost->noidung = $element['noi_dung'];
			$commentpost->save();

			$commentpost_new = DB::table('commentpost')->where('id_user', '=', $element['id_user'])->orderBy('created_at', 'desc')->first();

			DB::table('users')->where('id', '=', $element['id_user'])->increment('noibat', 1);
			DB::table('userpost')->where('id', '=', $element['id_userpost'])->increment('soluong_comment', 1);
			$user = DB::table('users')->where('id', '=', $element['id_user'])->first();

			$list_detail['noi_dung'] = $element['noi_dung'];
			$list_detail['id_userpost'] = $element['id_userpost'];
			$list_detail['id_user'] = $element['id_user'];
			$list_detail['id_commentpost'] = $commentpost_new->id;
			$list_detail['anh_dai_dien'] = $user->anhdaidien;
			$list_detail['ten_tai_khoan'] = $user->tentaikhoan;
		}
		// Trả lại comment của một user mới bình luận
		return response()->json($list_detail);
	}

	public function savedatareplycommentpost(Request $request) {
		$array = $request->all();
		foreach ($array as $value) {
			$element = json_decode($value, true);
			$reportcommentpost = new ReportCommentPost;
			$reportcommentpost->id_user = $element['id_user'];
			$reportcommentpost->id_CommentPost = $element['id_commentpost'];
			$reportcommentpost->noidung = $element['noi_dung'];
			$reportcommentpost->save();

			$reportcommentpost_new = DB::table('report_comment_post')->where('id_user', '=', $element['id_user'])->orderBy('created_at', 'desc')->first();
			$commentpost_new = DB::table('commentpost')->where('id', '=', $element['id_commentpost'])->first();
			// DB::table('userpost')->where('id', '=', $commentpost_new->userpost->id)->increment('soluong_comment', 1);
			DB::table('users')->where('id', '=', $element['id_user'])->increment('noibat', 1);
			$user = DB::table('users')->where('id', '=', $element['id_user'])->first();

			$list_detail['noi_dung'] = $element['noi_dung'];
			$list_detail['id_commentpost'] = $element['id_commentpost'];
			$list_detail['id_user'] = $element['id_user'];
			$list_detail['id_reportcommentpost'] = $reportcommentpost_new->id;
			$list_detail['anh_dai_dien'] = $user->anhdaidien;
			$list_detail['ten_tai_khoan'] = $user->tentaikhoan;
		}
		// $list_detail->json();
		// Trả lại một repply comment của người dùng
		return response()->json($list_detail);
	}

	public function savedatalikepost(Request $request) {
		$array = $request->all();
		foreach ($array as $value) {
			$element = json_decode($value, true);
			$likepost = new LikePost;
			$likepost->id_user = $element['id_user'];
			$likepost->id_userpost = $element['id_userpost'];

			$like = DB::table('likepost')->where('id_user', '=', $element['id_user'])->where('id_userpost', '=', $element['id_userpost'])->first();
			if (!empty($like)) {
				DB::table('likepost')->where('id_user', '=', $element['id_user'])->where('id_userpost', '=', $element['id_userpost'])->delete();
				DB::table('userpost')->where('id', '=', $element['id_userpost'])->decrement('soluotthich', 1);
				$check = "false";
			} else {
				$likepost->save();
				DB::table('userpost')->where('id', '=', $element['id_userpost'])->increment('soluotthich', 1);
				$check = "true";
			}

			$userpost_new = UserPost::where('id', '=', $element['id_userpost'])->first();
			$list_detail['id_userpost'] = $element['id_userpost'];
			$list_detail['id_user'] = $element['id_user'];
			$list_detail['like'] = $userpost_new->soluotthich;
			$list_detail['check'] = $check;
			$list_detail['like_post'] = $userpost_new->likepost;
		}
		// $list_detail->json();
		// Trả lại các thông tin liên quan tới việc thích bài viết của một user
		return response()->json($list_detail);
	}

	public function savedatacommentmonan(Request $request) {
		$array = $request->all();
		foreach ($array as $value) {
			$element = json_decode($value, true);
			$comment = new CommentMonAn;
			$comment->id_user = $element['id_user'];
			$comment->noi_dung = $element['noi_dung'];
			$comment->id_monan = $element['id_monan'];
			$comment->save();

			$comment_new = DB::table('commentmonan')->where('id_user', '=', $element['id_user'])->orderBy('created_at', 'desc')->first();

			$user = DB::table('users')->where('id', '=', $element['id_user'])->first();

			$list_detail['noi_dung'] = $element['noi_dung'];
			$list_detail['id_monan'] = $element['id_monan'];
			$list_detail['id_user'] = $element['id_user'];
			$list_detail['id_commentmonan'] = $comment_new->id;
			$list_detail['anh_dai_dien'] = $user->anhdaidien;
			$list_detail['ten_tai_khoan'] = $user->tentaikhoan;
			$list_detail['created_at'] = $comment_new->created_at;

		}
		// $list_detail->json();
		// Trả lại comment món ăn của người dùng
		return response()->json($list_detail);
	}

	public function getiduseronline(Request $request) {
		$list_detail = [];
		$list_detail['id'] = Auth::user()->id;
		return response()->json($list_detail);
	}
	public  function getAllPostUser() {
	    return response()->json(null);
    }
    public  function APItoFlask() {

    }

}