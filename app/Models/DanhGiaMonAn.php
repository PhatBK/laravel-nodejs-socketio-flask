<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGiaMonAn extends Model {
	protected $table = "danhgiamonan";
	public function monan() {
		return $this->belongsTo('App\Models\MonAn', 'id_monan', 'id');
	}
	public function user() {
		return $this->belongsTo('App\Models\User', 'id_user', 'id');
	}
	public function group_user() {

    }

}
