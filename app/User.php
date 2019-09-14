<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id','',
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

    /*
    this function use to make a relation between user and his role
    mean that user belongs to role  (one to one relation)
    */
    public function role(){
        return $this->belongsTo('App\Role');
    }
    /*
    this function use to make a relation between user and his photo
    mean that user belongs to photo  (one to one relation)
    */
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    /*function to prevent non admin users to access admin panel*/
    public function isAdmin(){
        if($this->role->name == 'administrator' && $this->is_active == 1){
            return true;
        }
        return false;
    }
    /*
    this function use to make a relation between user and his post
    mean that user has many posts (one to many relation)
    */
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
