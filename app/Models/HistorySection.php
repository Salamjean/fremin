<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorySection extends Model
{
    protected $fillable = ['title', 'title_en', 'content', 'content_en', 'presidents', 'is_active'];
    protected $casts = [
        'presidents' => 'array',
        'is_active' => 'boolean'
    ];
}
