<?php

namespace App\Http\Controllers;

use App\Models\CacBuocNau;
use App\Models\MonAn;
use File;
use Illuminate\Http\Request;

class CacBuocNauController extends Controller {
	public function getViewThemBuocNau($id) {
		$monan = MonAn::find($id);
		$sobuocnau = CacBuocNau::where('id_monan', $id)->count('id');
		$cacbuocnau = CacBuocNau::where('id_monan', $id)->get();
		return view('admin.monan.thembuocnau', compact('monan', 'sobuocnau', 'cacbuocnau'));
	}

	public function themBuocNau(Request $req, $id) {
		$monan = MonAn::find($id);
		$cacbuocnau = new CacBuocNau();

		$cacbuocnau->id_monan = $monan->id;
		$cacbuocnau->noidung = $req->noiDungBuoc;

		$this->validate($req, [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		if ($req->hasFile('image')) {
			$path = "uploads/monan";
			$file = $req->image;
			$filehinh = rand(1, 1000) . "_" . $file->getClientOriginalName();
			$file->move($path, $filehinh);
			$cacbuocnau->image = $filehinh;
		}
		$cacbuocnau->save();
		return redirect()->route('themBuocNau', $monan->id)->with('thembuocnauthanhcong', 'Đã thêm bước nấu thành công');
	}

	public function getViewSuaBuocNau($id_monan, $id_buocnau) {
		$buocnau = CacBuocNau::where('id', $id_buocnau)->where('id_monan', $id_monan)->first();
		return view('admin.monan.suabuocnau', compact('buocnau'));
	}

	public function suaBuocNau(Request $req, $id_monan, $id_buocnau) {
		$monan = MonAn::where('id', $id_monan)->first();
		$buocnau = CacBuocNau::where('id', $id_buocnau)->where('id_monan', $id_monan)->first();
		$path = "uploads/monan/";
		$anh = $path . $buocnau->image;

		$buocnau->noidung = $req->noiDungBuoc;
		$buocnau->image = $req->tenAnh;
		rename($anh, "uploads/monan/" . $req->tenAnh);
		$this->validate($req, [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
		if ($req->hasFile('image')) {
			File::delete($anh);
			$file = $req->image;
			$filehinh = rand(1, 1000) . "_" . $file->getClientOriginalName();
			$file->move($path, $filehinh);
			$buocnau->image = $filehinh;
		}
		$buocnau->save();
		return redirect()->route('themBuocNau', $monan->id)->with('suabuocnauthanhcong', 'Đã sửa bước nấu thành công');
	}

	public function xoaBuocNau($id_monan, $id_buocnau) {
		$monan = MonAn::where('id', $id_monan)->first();
		$anh = 'uploads/monan/' . CacBuocNau::where('id', $id_buocnau)->value('image');
		File::delete($anh);
		$buocnau = CacBuocNau::where('id', $id_buocnau)->where('id_monan', $id_monan)->delete();
		return redirect()->route('themBuocNau', $monan->id)->with('xoabuocnauthanhcong', 'Đã xóa bước nấu thành công!');
	}
	public  function  rollBackAll() {
        return response()->json(null);
    }
}
