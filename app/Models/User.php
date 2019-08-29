<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USER_ROLE = 1;
    const ADMIN_ROLE = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static $roleNames = [
        self::USER_ROLE => 'User',
        self::ADMIN_ROLE => 'Administrator'
    ];

    public function isAdmin()
    {
        return $this->role == self::ADMIN_ROLE;
    }

    public function getRoleName()
    {
        return array_key_exists($this->role, self::$roleNames) ? self::$roleNames[$this->role] : 'Unknown';
    }
}
