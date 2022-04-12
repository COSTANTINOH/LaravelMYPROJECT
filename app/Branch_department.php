<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Branch;
use App\Department;

class Branch_department extends Model
{
    //join table
    public function branchs(){
        return $this->belongsTo('App\Branch');
    }

    public function departments(){
        return $this->belongsTo('App\Department');
    }
}
