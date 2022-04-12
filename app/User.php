<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Address;
use App\Role;
use App\Photo;
use App\Position;
use App\Target;
use App\Phone;
use App\Report;
use App\Opinion;
use App\Approval;
use App\ULDB;
use App\Comment;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Permission_note;

class User extends Authenticatable  implements  JWTSubject 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(){
        return $this->belongsTo('App\Address');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function position(){
        return $this->belongsTo('App\Position');
    }
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function phones(){
        return $this->hasMany('App\Phone');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function opinions(){
        return $this->hasMany('App\Opinion');
    }

    public function approvals(){
        return $this->hasMany('App\Approval');
    }

    public function targets(){
        return $this->hasMany('App\Target');
    }

    public function reports(){
        return $this->hasMany('App\Report');
    }

    public function ulbd(){
        return $this->hasOne('App\ULBD');
    }

    public  function  getJWTIdentifier() {
        return  $this->getKey();
    }
    
    public  function  getJWTCustomClaims() {
        return [];
    }
    public function permission_notes(){
        return $this->hasMany('App\Permission_note');
    }
}
