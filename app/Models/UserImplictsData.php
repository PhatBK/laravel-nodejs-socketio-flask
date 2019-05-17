<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserImplictsData extends Model
{
    protected $table = "user_implicts_data";

    public static function getAll() {
        return UserImplictsData::all();
    }
}
