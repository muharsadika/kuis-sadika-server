<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use HasFactory;

    protected $fillable = [
        'diamond_category',
        'diamond_image',
        'diamond_amount',
        'diamond_price',
    ];
}
