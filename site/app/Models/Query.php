<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;
    protected $fillable = [
        'log_id', 'query_parameter'
    ];

    public function log() {
        return $this->belongsTo(Log::class);
    }
}
