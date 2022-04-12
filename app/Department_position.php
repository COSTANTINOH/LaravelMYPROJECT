<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Position;

class Department_position extends Model
{
    public function departments(){
        return $this->belongsTo('App\Department');
    }

    public function positions(){
        return $this->belongsTo('App\Position');
    }

}
