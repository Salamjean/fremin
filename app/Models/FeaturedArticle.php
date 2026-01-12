<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge_text',
        'badge_icon',
        'image',
        'image_alt',
        'category',
        'publication_date',
        'views',
        'title',
        'excerpt',
        'read_more_text',
        'read_more_link',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'views' => 'integer',
        'order' => 'integer',
        'publication_date' => 'date'
    ];

    // Scope pour les articles actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope pour trier par ordre
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Scope pour les articles récents
    public function scopeRecent($query, $limit = 3)
    {
        return $query->orderBy('publication_date', 'desc')->limit($limit);
    }

    // Récupérer l'article en vedette principal
    public static function getFeatured()
    {
        return self::active()->ordered()->first();
    }

    // Formatage de la date
    public function getFormattedDateAttribute()
    {
        return $this->publication_date->format('d F Y');
    }

    // Formatage du nombre de vues
    public function getFormattedViewsAttribute()
    {
        return number_format($this->views, 0, ',', ' ');
    }
}