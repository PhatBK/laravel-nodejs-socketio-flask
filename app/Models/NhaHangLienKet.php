<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaHangLienKet extends Model {
	protected $table = "nhahanglienket";

	public function monan() {
		return $this->belongsTo('App\Models\MonAn', 'id_monan', 'id');
	}
	public function nhahang() {
		return $this->belongsTo('App\Models\NhaHang', 'id_nhahang', 'id');
	}
}
