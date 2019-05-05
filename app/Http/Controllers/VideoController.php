<?php

namespace App\Http\Controllers;

use App\Models\MonAn;
use App\Models\Video;
use File;
use Illuminate\Http\Request;

class VideoController extends Controller {
	public function getViewThemVideo($id) {
		$monan = MonAn::find($id);
		$video = Video::where('id_monan', $id)->first();
		return view('admin.monan.themvideo', compact('monan', 'video'));
	}

	public function themVideo(Request $req, $id) {
		$monan = MonAn::find($id);
		$video = new Video();

		$this->validate($req, [
			'video' => 'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4',
		]);

		if ($req->hasFile('video')) {
			$path = "uploads/video";
			$file = $req->video;
			$fileVideo = rand(1, 1000) . "_" . $file->getClientOriginalName();
			$file->move($path, $fileVideo);
			$video->ten = $fileVideo;
		}
		$video->id_monan = $monan->id;
		$video->soluotxem = 0;
		$video->soluotthich = 0;
		$video->save();
		return redirect()->route('themVideo', $monan->id)->with('themvideothanhcong', 'Đã thêm Video thành công');
	}

	public function getViewSuaVideo($id_monan, $id_video) {
		$video = Video::where('id', $id_video)->where('id_monan', $id_monan)->first();
		return view('admin.monan.suavideo', compact('video'));
	}

	public function suaVideo(Request $req, $id_monan, $id_video) {
		$monan = MonAn::where('id', $id_monan)->first();
		$video = Video::where('id', $id_video)->where('id_monan', $id_monan)->first();
		$path = "uploads/video/";
		$vd = $path . $video->ten;

		$video->ten = $req->tenVideo;
		rename($vd, "uploads/video/" . $req->tenVideo);

		if ($req->hasFile('suaVideo')) {
			File::delete($vd);
			$file = $req->suaVideo;
			$filevideo = rand(1, 1000) . "_" . $file->getClientOriginalName();
			$file->move($path, $filevideo);
			$video->ten = $filevideo;
		}
		$video->save();
		return redirect()->route('themVideo', $monan->id)->with('suavideothanhcong', 'Đã sửa video thành công');
	}

	public function xoaVideo($id_monan, $id_video) {
		$monan = MonAn::find($id_monan);
		$vd = 'uploads/video/' . Video::where('id', $id_video)->value('ten');
		File::delete($vd);
		$video = Video::where('id', $id_video)->where('id_monan', $id_monan)->delete();
		return redirect()->route('themVideo', $monan->id)->with('xoavideothanhcong', 'Đã xóa video thành công');
	}
    public function rollBackAll() {
        return response()->json(null);
    }
}
