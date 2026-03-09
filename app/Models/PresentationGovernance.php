<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentationGovernance extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'title_en',
        'description',
        'description_en',
        'content',
        'content_en',
        'items',
        'sort_order',
        'is_active'
    ];
    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
