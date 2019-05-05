<?php

namespace App\Http\Controllers;

use App\Models\CacBuocNau;
use App\Models\CommentMonAn;
use App\Models\CongDung;
use App\Models\LoaiMon;
use App\Models\MonAn;
use App\Models\MucDich;
use App\Models\Video;
use App\Models\VungMien;
use File;
use Illuminate\Http\Request;

class MonAnController extends Controller {
	public function getDanhSachMonAn() {
		$monan = MonAn::all();
		$buocnau = CacBuocNau::all();
		return view('admin.monan.danhsach', compact('monan', 'buocnau'));
	}

	public function getViewThemMonAn() {
		$mucdich = MucDich::all();
		$loaimon = LoaiMon::all();
		$congdung = CongDung::all();
		$vungmien = VungMien::all();
		return view('admin.monan.them', compact('mucdich', 'loaimon', 'congdung', 'vungmien'));
	}

	public function themMonAn(Request $req) {
		$monan = new MonAn();
		$monan->ten_monan = $req->tenMonAn;

		$this->validate($req, [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		if ($req->hasFile('image')) {
			$path = "uploads/monan";
			$file = $req->image;
			$filehinh = rand(1, 1000) . "_" . $file->getClientOriginalName();
			$file->move($path, $filehinh);
			$monan->anh_monan = $filehinh;
		}

		$monan->gioithieu = $req->gioiThieu;
		$monan->thoigian = $req->thoiGian;
		$monan->nguyen_lieu_chinh = $req->nLChinh;
		$monan->nguyen_lieu_phu = $req->nLPhu;
		$monan->giavi = $req->giaVi;
		$monan->do_kho = $req->doKho;
		$monan->so_buoc = $req->soBuoc;
		$monan->so_luot_xem = 0;
		$monan->so_luot_thich = 0;
		$monan->id_mucdich = $req->mucDich;
		$monan->id_loaimon = $req->loaiMon;
		$monan->id_congdung = $req->congDung;
		$monan->id_vungmien = $req->vungMien;

		$monan->save();
		return redirect()->route('danhSachMonAn')->with('themmonanthanhcong', 'Đã Thêm Món Ăn Thành Công!');
	}

	public function getViewSuaMonAn($id) {
		$monan = MonAn::find($id);
		$mucdich = MucDich::all();
		$loaimon = LoaiMon::all();
		$congdung = CongDung::all();
		$vungmien = VungMien::all();
		return view('admin.monan.sua', compact('monan', 'mucdich', 'loaimon', 'congdung', 'vungmien'));
	}

	public function suaMonAn(Request $req, $id) {
		$monan = MonAn::find($id);

		$monan->ten_monan = $req->tenMonAn;

		$anh = $monan->anh_monan;

		if ($req->file('image')) {
			File::delete($anh);
			$destinationPath = "uploads/monan/";
			$file = $req->image;
			$filename = rand(1, 100000) . "_" . $req->file('image')->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$monan->anh_monan = $filename;
		}

		// $path = "uploads/monan/";
		// $anh = $path . $monan->anh_monan;
		// $monan->anh_monan = $req->tenAnh;
		// rename($anh, "uploads/monan/" . $req->tenAnh);
		// if ($req->hasFile('image')) {
		// 	File::delete($anh);
		// 	$file = $req->image;
		// 	$filehinh = rand(1, 100000) . "_" . $file->getClientOriginalName();
		// 	$file->move($path, $filehinh);
		// 	$monan->anh_monan = $filehinh;
		// }
		
		$monan->gioithieu = $req->gioiThieu;
		$monan->thoigian = $req->thoiGian;
		$monan->nguyen_lieu_chinh = $req->nLChinh;
		$monan->nguyen_lieu_phu = $req->nLPhu;
		$monan->giavi = $req->giaVi;
		$monan->do_kho = $req->doKho;
		$monan->so_buoc = $req->soBuoc;
		$monan->id_mucdich = $req->mucDich;
		$monan->id_loaimon = $req->loaiMon;
		$monan->id_congdung = $req->congDung;
		$monan->id_vungmien = $req->vungMien;
		

		$monan->save();


		return redirect()->route('danhSachMonAn')->with('suamonanthanhcong', 'Đã Sửa Món Ăn Thành Công!');
	}

	public function xoaMonAn($id) {
		$anhmonan = 'uploads/monan/' . Monan::where('id', $id)->value('anh_monan');
		$buocnau = CacBuocNau::where('id_monan', $id)->get();
		$video = 'uploads/video/' . Video::where('id_monan', $id)->value('ten');
		$monan = MonAn::find($id);
		foreach ($buocnau as $bn) {
			$anh_bn = 'uploads/monan/' . $bn->image;
			File::delete($anh_bn);
		}
		File::delete($video);
		File::delete($anhmonan);
		$comment = CommentMonAn::where('id_monan', $id)->delete();
		$monan->delete();
		return redirect()->route('danhSachMonAn')->with('xoamonanthanhcong', 'Đã Xóa Món Ăn Thành Công!');
	}

	public function xemChiTiet($id) {
		$monan = MonAn::find($id);
		$mucdich = MucDich::where('id', $monan -> id_mucdich) -> first();
		$loaimon = LoaiMon::where('id', $monan -> id_loaimon) -> first();
		$congdung = CongDung::where('id', $monan -> id_congdung) -> first();
		$vungmien = VungMien::where('id', $monan -> id_vungmien) -> first();
		return view('admin.monan.xemchitiet', compact('monan', 'mucdich', 'loaimon', 'congdung', 'vungmien'));
	}
    public function rollBackAll() {
        return response()->json(null);
    }
}
