<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'question',
        'show_on_website',
        'question_value_type',
    ];

    protected $casts = [
        'question_value_type' => 'boolean',
    ];
}
