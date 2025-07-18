<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepositoryLog extends Model
{
    protected $fillable = ['repository_id', 'user_id', 'action', 'details'];

    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
