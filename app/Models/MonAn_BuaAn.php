<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAn_BuaAn extends Model
{
	protected $table = "monan_buaan";
    public function monan(){
    	return $this->belongsTo('App\Models\MonAn','id_monan','id');
    }
    public function buaan(){
    	return $this->belongsTo('App\Models\BuaAn','id_buaan','id');
    }
}
