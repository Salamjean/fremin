<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_title',
        'section_subtitle',
        'main_image',
        'main_image_alt',
        'content_title',
        'content_text',
        'mission_title',
        'mission_text',
        'mission_icon',
        'vision_title',
        'vision_text',
        'vision_icon',
        'values_title',
        'values_text',
        'values_icon',
        'feature1_title',
        'feature1_text',
        'feature1_icon',
        'feature2_title',
        'feature2_text',
        'feature2_icon',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    // Scope pour les sections actives
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope pour trier par ordre
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Récupérer la section active (normalement il n'y en a qu'une)
    public static function getActive()
    {
        return self::active()->ordered()->first();
    }
}