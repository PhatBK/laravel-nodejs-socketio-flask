<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MucDich extends Model {
	protected $table = "mucdich";
	public function monan() {
		return $this->hasMany('App\Models\MonAn', 'id_mucdich', 'id');
	}
}
