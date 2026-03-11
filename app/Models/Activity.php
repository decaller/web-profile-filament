<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'date',
        'gallery',
    ];

    protected $casts = [
        'date' => 'date',
        'gallery' => 'array',
    ];
}
