<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    protected $fillable = [
        'publication_id',
        'ip_address',
        'user_agent'
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
