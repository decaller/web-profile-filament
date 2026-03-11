<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Setting extends Model
{
    use HasSEO;
    protected $guarded = [];

    protected $casts = [
        'social_links' => 'array',
    ];

    public static function getValue(string $key, $default = null)
    {
        $setting = static::first();
        return $setting ? ($setting->$key ?? $default) : $default;
    }

    public static function setValue(string $key, $value)
    {
        $setting = static::first() ?? new static();
        $setting->$key = $value;
        $setting->save();
    }
}
