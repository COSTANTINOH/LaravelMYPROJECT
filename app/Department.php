<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Branch_department;
use App\Department_postion;
use App\ULDB;

class Department extends Model
{
    public function branch_department(){
        return $this->hasMany('App\Branch_department');
    }

    public function department_position(){
        return $this->hasMany('App\Department_postion');
    }

    public function uldb(){
        return $this->hasMany('App\ULDB');
    }
}
