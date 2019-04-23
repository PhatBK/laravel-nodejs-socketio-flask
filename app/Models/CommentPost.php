<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model {
	protected $table = "commentpost";

	public function user() {
		return $this->belongsTo('App\Models\User', 'id_user', 'id');
	}
	public function userpost() {
		return $this->belongsTo('App\Models\UserPost', 'id_UserPost', 'id');
	}
	public function reportcommentpost() {
		return $this->hasMany('App\Models\ReportCommentPost', 'id_CommentPost', 'id');
	}
}
