<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'subtitle',
        'description',
        'image',
        'image_alt',
        'stat_number',
        'stat_label',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Scope pour les sections actives
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    // Récupérer la section héroïque active
    public static function getActive()
    {
        return self::active()->first();
    }
}