<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = "order_items";

    protected function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected function product()
    {
        return $this->belongsTo(Product::class);
    }
}
