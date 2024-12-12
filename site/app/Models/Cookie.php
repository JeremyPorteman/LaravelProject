<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookie extends Model
{
    use HasFactory;
    protected $fillable = [
        'log_id', 'cookie_parameter'
    ];

    public function log() {
        return $this->belongsTo(Log::class);
    }
}
