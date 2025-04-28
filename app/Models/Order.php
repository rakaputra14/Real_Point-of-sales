<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'order_date',
        'order_amount',
        'order_change',
        'order_status'
    ];

    protected $appends = ['formatted_date', 'formatted_amount', 'formatted_change'];

    public function getFormattedDateAttribute(): string
    {
        return date('Y-m-d', strtotime($this->order_date));
    }

    public function getFormattedAmountAttribute(): string
    {
        return 'Rp. ' . number_format($this->order_amount, 0, ',', '.');
    }

    public function getFormattedChangeAttribute(): string
    {
        return 'Rp. ' . number_format($this->order_change, 0, ',', '.');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
