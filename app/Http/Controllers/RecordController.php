<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Models\Record;
use App\Models\SurveyForm;
use App\Models\SurveyQuestions;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function recommendations(Request $request)
    {
        $response = [];

        $data =  (object) $request->all();

        $student_id = $request['student_id'];

        $forms = (object) SurveyForm::get();

        $self_record = Record::where('student_id', $student_id)
            ->where('year_level',  $data->year_level)
            ->where('semester',  $data->semester)
            ->orderBy('created_at', 'DESC')
            ->first();

        $top_student_record = (object)  Performance::orderBy('gpa', 'DESC')->get();

        $top = (object) $top_student_record[0];

        foreach ($forms as $form) {
            $response[$form->name] =  [
                'top' => [
                    'gpa' =>  $top,
                    'questions' => SurveyQuestions::where('survey_form_id', $form->id)->get(),
                    'records' => Record::where('student_id', $top->student_id)
                        ->where('year_level', $top->year_level)
                        ->where('semester', $top->semester)
                        ->where('survey_form_id', $self_record->survey_form_id)
                        ->orderBy('created_at', 'DESC')
                        ->get()
                ],
                'mine' => [
                    'performance' => Performance::where('student_id', $student_id)
                        ->where('year_level', $self_record->year_level)
                        ->where('year_level', $self_record->year_level)
                        ->first(),
                    'questions' => SurveyQuestions::where('survey_form_id', $form->id)->get(),
                    'records' => Record::where('student_id', $student_id)
                        ->where('year_level', $self_record->year_level)
                        ->where('survey_form_id', $self_record->survey_form_id)
                        ->where('semester', $self_record->semester)
                        ->get()
                ],
            ];
        }

        return $response;
    }

    public function store(Request $request)
    {
        $data = (object) $request->all();

        $savedData = [];

        foreach ($data->data as $record) {
            $new_record =  Record::create($record);

            array_push($savedData, $new_record);
        }

        return $savedData;
    }


    public function show(string $student_id)
    {
        return  Record::where('student_id', $student_id)
            ->with('student')
            ->with('survey_form')
            ->with('survey_form.questions')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function destroy(string $student_id)
    {
        return Record::find($student_id)->delete();
    }
}
