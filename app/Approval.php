<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Report;

class Approval extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function report(){
        return $this->belongsTo('App\Report');
    }
}
