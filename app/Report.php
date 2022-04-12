<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Report extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function task(){
        return $this->hasMany('App\Task');
    }

    public function report_type(){
        return $this->belongsTo('App\Report_types');
    }

    public function approval(){
        return $this->hasOne('App\Approval');
    }
}
