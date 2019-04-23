<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguyenLieu extends Model
{
    protected $table = "nguyenlieu";
    
    // public function monan(){
    // 	return $this->belongsTo('App\Models\MonAn', 'id_monan', 'id');
    // }
    public function monan_nguyenlieu(){
    	return $this->hasMany('App\Models\MonAnNguyenLieu','id_nguyenlieu','id');
    }
    public function monan(){
    	return $this->belongsToMany('App\Models\MonAn','App\Models\MonAnNguyenLieu','id_nguyenlieu','id_monan','id');
    }
}
