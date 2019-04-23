<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model {

	protected $table = "likepost";

	public function user() {
		return $this->belongsTo('App\Models\User', 'id_user', 'id');
	}
	public function userpost() {
		return $this->belongsTo('App\Models\UserPost', 'id_userpost', 'id');
	}
}
