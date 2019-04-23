<?php

namespace App\Http\Controllers;

use App\Models\CacBuocNau;
use App\Models\CommentMonAn;
use App\Models\CommentPost;
use App\Models\CongDung;
use App\Models\LoaiMon;
use App\Models\MonAn;
use App\Models\MucDich;
use App\Models\NhaHang;
use App\Models\NhaHangMonAn;
use App\Models\PostImage;
use App\Models\ReportCommentPost;
use App\Models\TheLoai;
use App\Models\ThongKe;
use App\Models\User;
use App\Models\UserPost;
use App\Models\Video;
use App\Models\VungMien;

class ThongKeController extends Controller {

	public function getLichSu() {
		$thongkes = ThongKe::all();
		return view('admin.thongke.lichsu', ['thongkes' => $thongkes]);
	}
	public function getThucHienTK() {
		$thongke = new ThongKe;
		//lấy kết quả
		$theloais = count(TheLoai::all());
		$loaimons = count(LoaiMon::all());
		$mucdichs = count(MucDich::all());
		$congdungs = count(CongDung::all());
		$vungmiens = count(VungMien::all());
		$monans = count(MonAn::all());
		$buocnaus = count(CacBuocNau::all());
		$users = count(User::all());
		$nhahangs = count(NhaHang::all());
		$nhahangmonans = count(NhaHangMonAn::all());
		$videos = count(Video::all());
		$baiviets = count(UserPost::all());
		$commentmonans = count(CommentMonAn::all());
		$commentposts = count(CommentPost::all());
		$report_commentposts = count(ReportCommentPost::all());
		$anhposts = count(PostImage::all());
		$anhs = $anhposts + $theloais + $loaimons + $congdungs + $vungmiens + $mucdichs + $monans + $buocnaus + $nhahangs;
		$comments = $commentmonans + $commentposts + $report_commentposts;
		$luottruycaps = 0;

		// lưu kết quả
		$thongke->soluong_monan = $monans;
		$thongke->soluong_theloai = $theloais;
		$thongke->soluong_loaimon = $loaimons;
		$thongke->soluong_congdung = $congdungs;
		$thongke->soluong_mucdich = $mucdichs;
		$thongke->soluong_vungmien = $vungmiens;
		$thongke->soluong_taikhoan = $users;
		$thongke->soluong_nhahanglienket = $nhahangs;
		$thongke->soluong_anh = $anhs;
		$thongke->soluong_video = $videos;
		$thongke->soluong_baipost = $baiviets;
		$thongke->soluong_comment = $comments;
		$thongke->soluong_truycap = 0;
		$thongke->save();
		//ket thuc luu
		$thongke =
			[
			'theloais' => $theloais,
			'loaimons' => $loaimons,
			'mucdichs' => $mucdichs,
			'congdungs' => $congdungs,
			'vungmiens' => $vungmiens,
			'monans' => $monans,
			'users' => $users,
			'nhahangs' => $nhahangs,
			'nhahangmonans' => $nhahangmonans,
			'videos' => $videos,
			'baiviets' => $baiviets,
			'comments' => $comments,
			'anhs' => $anhs,
			'luottruycaps' => $luottruycaps,
		];
		return view('admin.thongke.ketqua', $thongke);
	}
	public function getXoa($id) {
		$thongke = ThongKe::find($id);
		$thongke->delete();
		return redirect('admin/thongke/lichsu')->with('thongbao', 'Sucess : xoá lịch sử thống kê thành công..');
	}
    public function rollBackAll() {
        return response()->json(null);
    }
}
