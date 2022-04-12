<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Department_postion;

class Position extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }

    public function department_position(){
        return $this->hasMany('App\Department_postion');
    }
}
