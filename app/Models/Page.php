<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Datlechin\FilamentMenuBuilder\Contracts\MenuPanelable;
use Datlechin\FilamentMenuBuilder\Concerns\HasMenuPanel;

use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Page extends Model implements MenuPanelable
{
    use HasMenuPanel, HasSEO;

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
        );
    }

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function getMenuPanelTitleColumn(): string
    {
        return 'title';
    }

    public function getMenuPanelUrlUsing(): callable
    {
        return fn (self $model) => route('page.show', $model->slug);
    }

    public function getMenuPanelName(): string
    {
        return 'Halaman Profil';
    }
}
