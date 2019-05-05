<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportCommentPost extends Model {
	protected $table = "report_comment_post";

	public function user() {
		return $this->belongsTo('App\Models\User', 'id_user', 'id');
	}
	public function commentpost() {
		return $this->belongsTo('App\Models\CommentPost', 'id_CommentPost', 'id');
	}
}
