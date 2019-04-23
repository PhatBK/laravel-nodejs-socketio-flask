<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CongDung extends Model {
	protected $table = "congdung";
	public function monan() {
		return $this->hasMany('App\Models\MonAn', 'id_congdung', 'id');
	}
}
