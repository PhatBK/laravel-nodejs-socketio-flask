<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiMon extends Model {

	protected $table = "loaimon";
	public function theloai() {
		return $this->belongsTo('App\Models\TheLoai', 'id_theloai', 'id');
	}
	public function monan() {
		return $this->hasMany('App\Models\MonAn', 'id_loaimon', 'id');
	}
	public function userpost() {
		return $this->hasMany('App\Models\UserPost', 'id_loaimon', 'id');
	}
}
