<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplicitRatingRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'implicit_rating_id',

    ];
}
