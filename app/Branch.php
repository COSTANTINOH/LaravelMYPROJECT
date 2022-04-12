<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\ULDB;
use App\Branch_department;

class Branch extends Model
{
    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function uldb(){
        return $this->hasMany('App\ULDB');
    }

    public function branch_department(){
        return $this->hasMany('App\Branch_department');
    }
}
