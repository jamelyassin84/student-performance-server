<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuidanceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'year_level',
        'semester',
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
