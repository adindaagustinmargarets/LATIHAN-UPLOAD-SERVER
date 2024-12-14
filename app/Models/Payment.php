<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'payments';
    protected $fillable = [
        'merchant_ref',
        'tripay_reference',
        'method',
        'amount',
        'status',
        'customer_name',
        'customer_email',
        'customer_phone',
        'order_items',
        'paid_at',
        'payment_kategori'
    ];
}
