<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplicitRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function recommendations()
    {
        return $this->hasMany(ImplicitRatingRecommendation::class, 'implicit_rating_id', 'id');
    }
}
