<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Requests\StoreRecordRequest;

class RecordController extends Controller
{

    public function store(StoreRecordRequest $request)
    {
        $data = $request->all();
        $savedData = [];

        foreach ($data as $record) {
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
            ->get();
    }

    public function destroy(string $student_id)
    {
        return Record::find($student_id)->delete();
    }
}
