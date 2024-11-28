<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes if you want to enable soft deletes

    protected $table = 'foods'; // Specify the table name

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
    ];

    // Define the relationship with the Order model
    public function orders()
    {
        return $this->hasMany(Order::class); // A food item can have many orders
    }

    /* Accessor for image URL
    public function getImageUrlAttribute()
    {
        return asset('images/' . $this->image); // Assuming images are stored in the public/images directory
    }

    // Example scope to get foods within a specific price range
    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }*/
}

