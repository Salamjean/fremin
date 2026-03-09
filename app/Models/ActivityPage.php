<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityPage extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'title_en',
        'subtitle',
        'subtitle_en',
        'content',
        'content_en',
        'items',
        'metadata',
        'is_active'
    ];

    protected $casts = [
        'items' => 'array',
        'metadata' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
