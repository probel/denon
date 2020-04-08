<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
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
    function isAdmin() {
        return $this->role === 3 ? true : false;
    }
    function isManager() {
        return ($this->role === 1 || $this->role === 3) ? true : false;
    }
    function isContentManager() {
        return ($this->role === 2 || $this->role === 3) ? true : false;
    }
    function isClient() {
        return ($this->role === 0) ? true : false;
    }
}
