<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    

    public function users()
{
    return $this->belongsToMany(User::class)
                ->withPivot('role')
                ->withTimestamps();
}

public function userRole($userId)
{
    return $this->users()->where('user_id', $userId)->first()?->pivot->role;
}




    
}




