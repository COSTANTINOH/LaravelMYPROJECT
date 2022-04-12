<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Photo extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }
}
