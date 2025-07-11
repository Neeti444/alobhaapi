<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'post_applied',
        'name',
        'dob',
        'address',
        'contact',
        'email',
        'expected_ctc',
        'current_ctc',
        'notice_period',
        'total_exp',
        'name_of_company',
        'qualification',
        'strengths',
        'improvement',
        'leaving_reason',
        'ach_last_com',
        'future_add',
        'reference',
    ];

    protected $casts = [
        'name_of_company' => 'array',
        'qualification' => 'array',
    ];
}















