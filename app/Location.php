<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ULDB;
use App\Branch;

class Location extends Model
{
    public function uldb(){
        return $this->hasMany('App\ULDB');
    }

    public function branches(){
        return $this->hasMany('App\Branch');
    }
}
