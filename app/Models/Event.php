<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event_date',
        'start_time',
        'end_time',
        'location',
        'location_type',
        'month_short',
        'month_full',
        'day',
        'year',
        'image',
        'image_alt',
        'description',
        'button_text',
        'button_link',
        'button_class',
        'is_active',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'event_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'day' => 'integer',
        'year' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatiquement remplir les champs de date lors de la création
        static::creating(function ($event) {
            $event->fillDateFields();
        });

        // Automatiquement mettre à jour les champs de date lors de la modification
        static::updating(function ($event) {
            if ($event->isDirty('event_date')) {
                $event->fillDateFields();
            }
        });
    }

    // Méthode pour remplir automatiquement les champs de date
    public function fillDateFields()
    {
        $date = Carbon::parse($this->event_date);

        // Mois en français (abréviation)
        $frenchMonthsShort = [
            'Janv',
            'Fév',
            'Mars',
            'Avr',
            'Mai',
            'Juin',
            'Juil',
            'Août',
            'Sept',
            'Oct',
            'Nov',
            'Déc'
        ];

        // Mois en français (complet)
        $frenchMonthsFull = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Août',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre'
        ];

        $monthIndex = $date->month - 1;

        $this->month_short = $frenchMonthsShort[$monthIndex];
        $this->month_full = $frenchMonthsFull[$monthIndex];
        $this->day = $date->day;
        $this->year = $date->year;
    }

    // Scope pour les événements actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope pour les événements à venir
    public function scopeUpcoming($query)
    {
        return $query->active()
            ->where('event_date', '>=', today())
            ->orderBy('event_date')
            ->orderBy('start_time');
    }

    // Scope pour les événements en vedette
    public function scopeFeatured($query)
    {
        return $query->active()
            ->where('is_featured', true);
    }



    // Méthode pour obtenir le temps formaté
    public function getFormattedTimeAttribute()
    {
        $start = Carbon::parse($this->start_time)->format('H\hi');
        if ($this->end_time) {
            $end = Carbon::parse($this->end_time)->format('H\hi');
            return "{$start} - {$end}";
        }
        return $start;
    }

    // Méthode pour vérifier si l'événement est en ligne
    public function getIsOnlineAttribute()
    {
        return $this->location_type === 'online';
    }

    public static function getActive()
    {
        return self::where('is_active', true)
            ->where('event_date', '>=', Carbon::today())
            ->orderBy('event_date')
            ->orderBy('start_time')
            ->get();
    }

    /**
     * Récupérer les événements actifs limités (pour la page actualité)
     */
    public static function getActiveLimited($limit = 4)
    {
        return self::where('is_active', true)
            ->where('event_date', '>=', Carbon::today())
            ->orderBy('event_date')
            ->orderBy('start_time')
            ->take($limit)
            ->get();
    }

    /**
     * Récupérer les événements en vedette
     */
    public static function getFeatured($limit = 3)
    {
        return self::where('is_active', true)
            ->where('is_featured', true)
            ->where('event_date', '>=', Carbon::today())
            ->orderBy('event_date')
            ->orderBy('start_time')
            ->take($limit)
            ->get();
    }

    // Méthode pour obtenir l'icône de localisation
    public function getLocationIconAttribute()
    {
        return $this->is_online ? 'fas fa-video' : 'fas fa-map-marker-alt';
    }

    // Méthode pour obtenir la classe CSS du bouton
    public function getButtonCssAttribute()
    {
        return $this->button_class ?: 'btn-primary';
    }
}
