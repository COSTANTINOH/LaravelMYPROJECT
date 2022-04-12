<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Report;
use App\Target;

class Task extends Model
{
    public function report(){
        return $this->belongsTo('App\Report');
    }

    public function target(){
        return $this->belongsTo('App\Target');
    }
}
