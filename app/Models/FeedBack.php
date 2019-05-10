<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = "feedback";

    public function user() {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }

}
