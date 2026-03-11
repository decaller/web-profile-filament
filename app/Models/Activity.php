<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Activity extends Model
{
    use HasSEO;

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: \Illuminate\Support\Str::limit(strip_tags($this->content), 160),
            image: !empty($this->gallery) ? \Illuminate\Support\Facades\Storage::url($this->gallery[0]) : null,
        );
    }
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
