<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentMonAn extends Model {
	protected $table = "commentmonan";
	public function monan() {
		return $this->belongsTo('App\Models\MonAn', 'id_monan', 'id');
	}
	public function user() {
		return $this->belongsTo('App\Models\User', 'id_user', 'id');
	}
}
