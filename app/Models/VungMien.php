<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VungMien extends Model {
	protected $table = "vungmien";
	public function monan() {
		return $this->hasMany('App\Models\MonAn', 'id_VungMien', 'id');
	}
}
