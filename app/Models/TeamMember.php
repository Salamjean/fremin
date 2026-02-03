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
        'image',
        'image_alt',
        'bio',
        'is_president',
        'linkedin_url',
        'sort_order',
        'is_active'
    ];

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