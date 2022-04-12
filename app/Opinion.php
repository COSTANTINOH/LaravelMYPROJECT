<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Opinion extends Model
{
    protected $fillable=[
        'user_id',
        'description',
        'date',
        'status',
        ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
