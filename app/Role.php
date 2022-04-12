<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role_permission;

class Role extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }

    public function role_permission(){
        return $this->belongsTo('App\Role_permission');
    }
}
