<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'service',
        'product',
        'bill',
        'whatsapp_number',
        'address',
        'order_status',
        'action'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
