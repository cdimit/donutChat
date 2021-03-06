<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;
use Skybluesofa\Followers\Traits\Followable;

class User extends Authenticatable
{
    use Notifiable;
    use Followable;

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

    public function msg()
    {
      return $this->hasMany('App\Messages', 'user_id');
    }

    public function part()
    {
      return $this->hasMany('App\Participans', 'user_id');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function myLove()
    {
      return $this->hasMany('App\Love', 'auth_id');
    }

    public function hasLove()
    {
      return $this->hasMany('App\Love', 'user_id');
    }

}
