<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancedCompany extends Model
{
    protected $fillable = [
        'company_name',
        'industry',
        'image_before',
        'image_after',
        'description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
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
