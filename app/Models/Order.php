<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'customer_name',
        'customer_email',
        'arrival_time',
        'amount',
        'payment_method',
    ];

    // Mahusiano ya Order na User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mahusiano ya Order na Food
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
