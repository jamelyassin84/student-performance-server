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
        'survey_form_id',
        'show_on_website',
        'question_value_type',
    ];

    protected $casts = [
        'show_on_website' => 'boolean',
    ];
}
