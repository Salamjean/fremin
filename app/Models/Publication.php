<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',
        'file_path',
        'file_name',
        'file_size',
        'file_format',
        'page_count',
        'thumbnail',
        'thumbnail_alt',
        'publication_date',
        'period',
        'language',
        'isbn',
        'author',
        'is_published',
        'is_featured',
        'is_active',
        'downloads',
        'views',
        'sort_order'
    ];

    protected $casts = [
        'publication_date' => 'date',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'page_count' => 'integer',
        'downloads' => 'integer',
        'views' => 'integer',
        'sort_order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($publication) {
            if ($publication->is_published && !$publication->publication_date) {
                $publication->publication_date = now();
            }
        });

        static::updating(function ($publication) {
            if ($publication->isDirty('is_published') && $publication->is_published && !$publication->publication_date) {
                $publication->publication_date = now();
            }
        });
    }

    // Scope pour les publications publiées
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('is_active', true);
    }

    // Scope pour les publications en vedette
    public function scopeFeatured($query)
    {
        return $query->published()
            ->where('is_featured', true)
            ->orderBy('publication_date', 'desc');
    }

    // Scope pour les publications récentes
    public function scopeRecent($query, $limit = 6)
    {
        return $query->published()
            ->orderBy('publication_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take($limit);
    }

    // Scope par type
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Méthode pour obtenir les publications actives (comme getActive())
    public static function getActive()
    {
        return self::published()
            ->orderBy('publication_date', 'desc')
            ->orderBy('sort_order')
            ->get();
    }

    // Méthode pour obtenir les publications en vedette
    public static function getFeatured($limit = 3)
    {
        return self::featured()
            ->take($limit)
            ->get();
    }

    // Méthode pour obtenir les publications récentes
    public static function getRecent($limit = 6)
    {
        return self::recent($limit)->get();
    }

    // Méthode pour formater la date
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->publication_date)
            ->translatedFormat('F Y');
    }

    // Méthode pour obtenir l'icône selon le type
    public function getTypeIconAttribute()
    {
        $icons = [
            'rapport' => 'fas fa-file-contract',
            'etude' => 'fas fa-chart-line',
            'guide' => 'fas fa-book',
            'brochure' => 'fas fa-newspaper',
            'autre' => 'fas fa-file-alt'
        ];

        return $icons[$this->type] ?? 'fas fa-file';
    }

    // Méthode pour obtenir la couleur selon le type
    public function getTypeColorAttribute()
    {
        $colors = [
            'rapport' => '#dc3545',
            'etude' => '#0d6efd',
            'guide' => '#198754',
            'brochure' => '#6f42c1',
            'autre' => '#6c757d'
        ];

        return $colors[$this->type] ?? '#6c757d';
    }

    // Méthode pour obtenir le texte du type
    public function getTypeTextAttribute()
    {
        $texts = [
            'rapport' => __('messages.cat_rapports'),
            'etude' => __('messages.cat_etudes'),
            'guide' => __('messages.cat_guides'),
            'brochure' => __('messages.cat_brochures'),
            'autre' => __('messages.cat_autres')
        ];

        return $texts[$this->type] ?? __('messages.cat_autres');
    }

    // Méthode pour obtenir l'URL de téléchargement
    public function getDownloadUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }

    // Méthode pour obtenir l'URL de la miniature
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return asset('assets/img/default-publication.jpg');
    }

    // Méthode pour obtenir la description courte
    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->description, 120);
    }

    // Méthode pour incrémenter le compteur de téléchargements
    public function incrementDownloads()
    {
        $this->increment('downloads');
    }

    // Méthode pour incrémenter le compteur de vues
    public function incrementViews()
    {
        $this->increment('views');
    }
}