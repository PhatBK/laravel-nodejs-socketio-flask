<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NhaHang extends Authenticatable {
	use Notifiable;

	protected $table = "nhahang";
	protected $guard = 'nhahang';
	protected $fillable = [
		'ten', 'tenkhongdau', 'username', 'luotxem', 'lienhe', 'vitri', 'gioithieu', 'anh', 'level', 'noibat',
	];
	public $timestamps = true;
	protected $hidden = [
		'password', 'remember_token',
	];

	public function nhahanglienket() {
		return $this->hasMany('App\Models\NhaHangLienKet', 'id_nhahang', 'id');
	}
	public function userpost() {
		return $this->hasMany('App\Models\UserPost', 'id_nhahang', 'id');
	}
	public function nhahangmonan() {
		return $this->hasMany('App\Models\NhaHangMonAn', 'id_nhahang', 'id');
	}
}
