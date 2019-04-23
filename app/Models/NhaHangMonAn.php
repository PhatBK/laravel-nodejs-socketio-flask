<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaHangMonAn extends Model {
	protected $table = "nhahangmonan";

	public function nhahang() {
		return $this->belongsTo('App\Models\NhaHang', 'id_nhahang', 'id');
	}
}
