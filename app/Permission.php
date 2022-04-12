<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role_permission;

class Permission extends Model
{
    public function role_permission(){
        return $this->hasMany('App\Role_permission');
    }
}
