<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'author_name',
        'author_title',
        'content',
        'avatar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
