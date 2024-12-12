<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'url'
    ];

    public function requests() {
        return $this->hasMany(Request::class);
    }

    public function queries() {
        return $this->hasMany(Query::class);
    }

    public function cookies() {
        return $this->hasMany(Cookie::class);
    }
}
