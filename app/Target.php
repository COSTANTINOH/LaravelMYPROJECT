<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Task;
class Target extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }
}
