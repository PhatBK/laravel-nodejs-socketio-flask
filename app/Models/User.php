<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'hovaten', 'gioitinh', 'tuoi', 'congviec', '', 'name', 'email', 'tentaikhoan', 'level', 'noibat', 'anhdaidien', '', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
	public function commentmonan() {
		return $this->hasMany('App\Models\CommentMonAn', 'id_user', 'id');
	}
	public function userpost() {
		return $this->hasMany('App\Models\UserPost', 'id_user', 'id');
	}
	public function commentpost() {
		return $this->hasMany('App\Models\CommentPost', 'id_user', 'id');
	}
	public function reportcommentpost() {
		return $this->hasMany('App\Models\ReportCommentPost', 'id_user', 'id');
	}
	public function likepost() {
		return $this->hasMany('App\Models\LikePost', 'id_user', 'id');
	}
	public function likemonan() {
		return $this->hasMany('App\Models\LikeMonAn', 'id_user', 'id');
	}
	public function danhgiamonan() {
		return $this->hasMany('App\Models\DanhGiaMonAn', 'id_user', 'id');
	}

}
