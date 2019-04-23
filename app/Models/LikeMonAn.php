<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeMonAn extends Model {
	protected $table = "likemonan";

	public function user() {
		return $this->belongsTo('App\Models\User', 'id_user', 'id');
	}
	public function monan() {
		return $this->belongsTo('App\Models\MonAn', 'id_monan', 'id');
	}
}
