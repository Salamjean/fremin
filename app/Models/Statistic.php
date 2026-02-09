<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'label',
        'label_en',
        'value',
        'icon',
        'sort_order',
        'is_active'
    ];

    public function getLabelAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['label_en'])) {
            return $this->attributes['label_en'];
        }
        return $value;
    }

    protected $casts = [
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
