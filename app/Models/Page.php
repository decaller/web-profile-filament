<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Datlechin\FilamentMenuBuilder\Contracts\MenuPanelable;
use Datlechin\FilamentMenuBuilder\Concerns\HasMenuPanel;

class Page extends Model implements MenuPanelable
{
    use HasMenuPanel;

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
