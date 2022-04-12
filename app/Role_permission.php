<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;
use App\Role;

class Role_permission extends Model
{
    public function permission(){
        return $this->belongsTo('App\Permission');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }
}
