<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'repository_id'];

    public function versions()
    {
        return $this->hasMany(FileVersion::class);
    }

    public function latestVersion()
    {
        return $this->hasOne(FileVersion::class)->orderByDesc('version');
    }

    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }
}


