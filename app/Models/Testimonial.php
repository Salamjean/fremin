<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_logo',
        'sector',
        'sector_en',
        'rating',
        'quote',
        'quote_en',
        'author_name',
        'author_position',
        'author_position_en',
        'sort_order',
        'is_active'
    ];

    public function getSectorAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['sector_en'])) {
            return $this->attributes['sector_en'];
        }
        return $value;
    }

    public function getQuoteAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['quote_en'])) {
            return $this->attributes['quote_en'];
        }
        return $value;
    }

    public function getAuthorPositionAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['author_position_en'])) {
            return $this->attributes['author_position_en'];
        }
        return $value;
    }

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'rating' => 'integer'
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
