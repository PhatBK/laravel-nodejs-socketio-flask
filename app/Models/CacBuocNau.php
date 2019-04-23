<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CacBuocNau extends Model {

	protected $table = "cacbuocnau";
	public function monan() {
		return $this->belongsTo('App\Models\MonAn', 'id_monan', 'id');
	}
}
