<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Models\Record;
use App\Models\SurveyForm;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{


    public function index(Request $request)
    {
        $data = (object) $request->all();

        $query = Performance::where('student_id', $data->student_id);

        foreach ($data as $key => $value) {
            $query = $query->where($key, $value);
        }

        return $query->get();
    }


    public function store(Request $request)
    {
        $data = (object) $request->all();

        $performances = Performance::where('student_id', $data->student_id)
            ->where('year_level', $request->year_level)
            ->where('semester', $request->semester)
            ->get();

        if (count($performances) === 0) {
            return Performance::create($request->all());
        }

        return response('You already answered a survey in this semester', 402);
    }


    public function show(string $id)
    {
        return Performance::where('student_id', $id)->get();
    }

    public function by_college()
    {
        return
            collect(Performance::with('student')->get())->filter(function (Performance $performance) {
                return $performance->student !== null;
            })->filter(function (Performance $performance) {

                return  collect([
                    'College of Computer Studies',
                    'College of Nursing',
                    'College of Arts and Sciences',
                ])
                    ->contains($performance->student->department);
            })
            ->map(function (Performance $performance) {

                $records = collect(Record::all()
                    ->where('student_id', $performance->student->user_id)
                    ->where('year_level', $performance->year_level)
                    ->where('semester', $performance->semester)
                    ->map(function (Record $record) {
                        $record->survey_form = SurveyForm::where('id', $record->survey_form_id)
                            ->first();

                        return $record;
                    }))->unique('survey_form.id');

                $performance->records = $records;

                return $performance;
            });
    }

    public function update(Request $request, string $id)
    {
        $performance  = Performance::findOrFail($id);

        $performance->fill($request->all())->save();

        return $performance;
    }

    public function destroy(string $id)
    {
        return Performance::find($id)->delete();
    }
}
