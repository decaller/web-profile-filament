<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'document_file',
        'gallery',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];
}
