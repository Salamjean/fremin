<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrategicAxis extends Model
{
    protected $fillable = ['axis_number', 'title', 'title_en', 'description', 'description_en', 'image', 'is_active'];
    protected $casts = [
        'is_active' => 'boolean',
        'axis_number' => 'integer'
    ];
}
