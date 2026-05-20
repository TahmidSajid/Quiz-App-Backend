<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'options'
    ];

    protected $casts = [
        'question' => 'string',
        'answer' => 'string',
        'options' => 'object',
    ];
}
