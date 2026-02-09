<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'position_en',
        'image',
        'image_alt',
        'bio',
        'bio_en',
        'is_president',
        'linkedin_url',
        'sort_order',
        'is_active'
    ];

    public function getPositionAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['position_en'])) {
            return $this->attributes['position_en'];
        }
        return $value;
    }

    public function getBioAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['bio_en'])) {
            return $this->attributes['bio_en'];
        }
        return $value;
    }

    protected $casts = [
        'is_active' => 'boolean',
        'is_president' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Scope pour les membres actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope pour trier par ordre
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}