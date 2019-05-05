<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAnNguyenLieu extends Model
{
	protected $table = "monan_nguyenlieu";
    public function monan(){
    	return $this->belongsTo('App\Models\MonAn','id_monan','id');
    }
    public function nguyenlieu(){
    	return $this->belongsTo('App\Models\NguyenLieu','id_nguyenlieu','id');
    }
}
