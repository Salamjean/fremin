<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'icon',
        'description',
        'description_en',
        'content',
        'content_en',
        'list_items',
        'link',
        'theme',
        'sort_order',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            }
        });
        static::updating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            } elseif ($model->isDirty('title') && $model->slug === \Illuminate\Support\Str::slug($model->getOriginal('title'))) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            }
        });
    }

    public function getTitleAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['title_en'])) {
            return $this->attributes['title_en'];
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

    public function getContentAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['content_en'])) {
            return $this->attributes['content_en'];
        }
        return $value;
    }

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'list_items' => 'array'
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
