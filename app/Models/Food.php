<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods'; // Hakikisha jina la table limetajwa

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
    ];
}
