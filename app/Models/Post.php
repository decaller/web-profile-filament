<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Post extends Model
{
    use HasSEO;

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: \Illuminate\Support\Str::limit(strip_tags($this->content), 160),
            image: $this->image ? \Illuminate\Support\Facades\Storage::url($this->image) : null,
        );
    }
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
