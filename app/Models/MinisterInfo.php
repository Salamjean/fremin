<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MinisterInfo extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'function',
        'function_en',
        'image',
        'signature',
        'message',
        'message_en',
    ];

    public function getNameAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['name_en'])) {
            return $this->attributes['name_en'];
        }
        return $value;
    }

    public function getFunctionAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['function_en'])) {
            return $this->attributes['function_en'];
        }
        return $value;
    }

    public function getMessageAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['message_en'])) {
            return $this->attributes['message_en'];
        }
        return $value;
    }

}
