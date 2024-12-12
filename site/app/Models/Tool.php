<?php

namespace App\Models;

use App\Casts\PriceJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class Tool extends Model
{
    use HasFactory;
    protected $fillable = [
        'price'
    ];

    public function invoices() {
        return $this->belongsToMany(Invoice::class);
    }

    protected $casts = [
        'price' => PriceJson::class
    ];

    public function scopeWherePriceIsGreaterThan($query, $amount) {
        return $query->where('price->amount', '>', $amount);
    }
}
