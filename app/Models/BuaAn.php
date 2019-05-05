<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuaAn extends Model
{
	protected $table = "buaan";
    public function monan_buaan(){
    	return $this->hasMany('App\Models\MonAn_BuaAn','id_buaan','id');
    }
    public function monan(){
    	return $this->hasManyThrough('App\Models\MonAn','App\Models\MonAn_BuaAn','id_buaan','id_monan','id');
    }
}
