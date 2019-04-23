<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model {
	protected $table = "theloai";
	public function loaimon() {
		return $this->hasMany('App\Models\LoaiMon', 'id_theloai', 'id');
	}
	public function monan() {
		return $this->hasManyThrough('App\Models\MonAn', 'App\Models\LoaiMon', 'id_theloai', 'id_loaimon', 'id','id');
	}
}
