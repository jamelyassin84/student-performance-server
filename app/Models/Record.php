<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_form_id',
        'question_id',
        'student_id',
        'year_level',
        'semester',
        'score',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'question_id');
    }

    public function survey_form()
    {
        return $this->hasOne(SurveyForm::class, 'id', 'survey_form_id');
    }
}
