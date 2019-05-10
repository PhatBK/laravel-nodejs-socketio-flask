<?php

namespace App\Http\Controllers;

use App\Models\CommentMonAn;
use App\Models\MonAn;

class CommentController extends Controller {
	public function getDanhSachComment($id_monan) {
		$comment = CommentMonAn::where('id_monan', $id_monan)->get();
		return view('admin.monan.binhluan', compact('comment'));
	}
	public function xoaComment($id, $id_monan) {
		$monan = MonAn::find($id_monan);
		$comment = CommentMonAn::where('id', $id)->where('id_monan', $id_monan)->delete();
		return redirect()->route('binhLuan', $monan->id)->with('xoabinhluanthanhcong', 'Đã Xóa Bình Luận Thành Công!');
	}
	public  function rollBackAll() {
        return response()->json(null);
    }
}
