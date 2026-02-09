<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancedCompany extends Model
{
    protected $fillable = [
        'company_name',
        'industry',
        'industry_en',
        'image_before',
        'image_after',
        'description',
        'description_en',
        'sort_order',
        'is_active'
    ];

    public function getIndustryAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['industry_en'])) {
            return $this->attributes['industry_en'];
        }
        return $value;
    }

    public function getDescriptionAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['description_en'])) {
            return $this->attributes['description_en'];
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
