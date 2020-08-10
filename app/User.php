<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'useraccountlevel'
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

    public function projects() {

        return $this->hasMany(Project::class);
    }

    public function profile() {

        return $this->hasOne(Profile::class);
    }

    public function roles() {

        return $this->belongsToMany(Role::class);
    }

   // public function accountLevel($useraccountlevel) {

//        if($this->user()->whereIn(column: 'useraccountlevel', $useraccountlevel) = 90){
  //          $role = "admin"
    //    }
      //      elseif ($this->user()->whereIn(column: 'useraccountlevel', $useraccountlevel) = 60){
      //      $role = "manager"
       // }
   // }
}
