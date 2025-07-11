<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $fillable = ['name', 'email', 'password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

   
public function ownedRepositories()
{
    return $this->hasMany(Repository::class, 'user_id');
}

public function repositories()
{
    return $this->belongsToMany(Repository::class)
                ->withPivot('role')
                ->withTimestamps();
}

 
  

}

