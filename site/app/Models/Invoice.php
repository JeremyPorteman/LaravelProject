<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'purchase_order_id', 'total_amount', 'amount_before_tax', 'tax', 'send_at', 'acquitted_at'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function tools() {
        return $this->belongsToMany(Tool::class);
    }

    protected $casts = [
        'send_at' => 'date:d/m/Y',
        'acquitted_at' => 'date:d/m/Y'
    ];
}
