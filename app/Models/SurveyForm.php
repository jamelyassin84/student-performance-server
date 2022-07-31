<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'question_type',
        'description'
    ];

    public function questions()
    {
        return $this->hasMany(SurveyQuestions::class, 'survey_form_id', 'id');
    }
}
