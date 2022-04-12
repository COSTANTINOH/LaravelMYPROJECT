<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Report;

class Report_types extends Model
{
    public function report(){
        return $this->hasMany('App\Report');
    }
}
