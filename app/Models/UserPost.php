<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPost extends Model {
	protected $table = "userpost";

	public function postimage() {
		return $this->hasMany('App\Models\PostImage', 'id_post', 'id');
	}
	public function commentpost() {
		return $this->hasMany('App\Models\CommentPost', 'id_UserPost', 'id');
	}
	public function user() {
		return $this->belongsTo('App\Models\User', 'id_user', 'id');
	}
	public function loaimon() {
		return $this->belongsTo('App\Models\LoaiMon', 'id_loaimon', 'id');
	}
	public function likepost() {
		return $this->hasMany('App\Models\LikePost', 'id_userpost', 'id');
	}
}
