<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Add the fields that you want to be mass assignable
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'total',
        'payment_method',
    ];

    // Define relationships if needed
    public function user()
{
    return $this->belongsTo(User::class);
}

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
