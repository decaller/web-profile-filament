<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
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
