<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'image_alt',
        'category',
        'category_color',
        'date',
        'type',
        'title',
        'excerpt',
        'views',
        'link',
        'link_text',
        'is_event',
        'event_date',
        'event_registrations',
        'event_button_text',
        'event_button_icon',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_event' => 'boolean',
        'views' => 'integer',
        'event_registrations' => 'integer',
        'order' => 'integer',
        'date' => 'date',
        'event_date' => 'date'
    ];

    // Scope pour les articles actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope pour trier par ordre
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('date', 'desc');
    }

    // Scope pour les événements à venir
    public function scopeUpcomingEvents($query)
    {
        return $query->where('is_event', true)
                     ->where('event_date', '>=', now())
                     ->orderBy('event_date', 'asc');
    }

    // Scope pour les articles récents
    public function scopeRecent($query, $limit = 6)
    {
        return $query->where('is_event', false)
                     ->orderBy('date', 'desc')
                     ->limit($limit);
    }

    // Formatage de la date
    public function getFormattedDateAttribute()
    {
        return $this->date->format('d M Y');
    }

    // Formatage de la date d'événement
    public function getFormattedEventDateAttribute()
    {
        return $this->event_date ? $this->event_date->format('d M Y') : null;
    }

    // Formatage du jour de l'événement
    public function getEventDayAttribute()
    {
        return $this->event_date ? $this->event_date->format('d') : null;
    }

    // Formatage du mois de l'événement
    public function getEventMonthAttribute()
    {
        return $this->event_date ? $this->event_date->format('M') : null;
    }

    // Formatage du nombre de vues
    public function getFormattedViewsAttribute()
    {
        return number_format($this->views, 0, ',', ' ');
    }

    // Formatage du nombre d'inscrits
    public function getFormattedRegistrationsAttribute()
    {
        return number_format($this->event_registrations, 0, ',', ' ');
    }

    // Récupérer tous les articles actifs
    public static function getActive()
    {
        return self::active()->ordered()->get();
    }

    // Récupérer les articles récents (non événements)
    public static function getRecentArticles($limit = 3)
    {
        return self::active()->recent($limit)->get();
    }

    // Récupérer les événements à venir
    public static function getUpcomingEvents($limit = 3)
    {
        return self::active()->upcomingEvents()->limit($limit)->get();
    }
}