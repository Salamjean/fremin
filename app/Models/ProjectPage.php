<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPage extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'title_en',
        'subtitle',
        'subtitle_en',
        'content',
        'content_en',
        'realisations',
        'media',
        'is_active'
    ];

    protected $casts = [
        'realisations' => 'array',
        'media' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
