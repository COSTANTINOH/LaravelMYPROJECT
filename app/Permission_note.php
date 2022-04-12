<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_note extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
