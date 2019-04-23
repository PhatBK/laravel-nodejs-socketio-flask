<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model {
	protected $table = "postimage";

	public function userpost() {
		return $this->belongsTo('App\Models\UserPost', 'id_post', 'id');
	}
}
