<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        'answers',
        'user_id',
    ];

    protected $casts = [
        'user_id' => 'string',
        'answers'  => 'object',
    ];
}
