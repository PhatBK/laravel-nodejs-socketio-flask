<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserServey extends Model
{
    protected $table = "survey_user";
    public function user() {

    }
    public function loaimon() {

    }
    public function fine_once_survey($id, $id_user, $id_loaimon) {
        $survey_once = '';
    }

}
