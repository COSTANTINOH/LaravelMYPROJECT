<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Department;
use App\Location;
use App\Branch;

class ULBD extends Model
{
    protected $table='uldbs';
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
