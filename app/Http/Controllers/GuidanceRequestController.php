<?php

namespace App\Http\Controllers;

use App\Models\GuidanceRequest;
use Illuminate\Http\Request;

class GuidanceRequestController extends Controller
{

    public function index(Request $request)
    {
        return  GuidanceRequest::with('student')
            ->with('survey_form')
            ->with('survey_form.questions')
            ->get();
    }

    public function show(string $student_id)
    {
        return  GuidanceRequest::where('student_id', $student_id)
            ->with('student')
            ->with('survey_form')
            ->with('survey_form.questions')
            ->get();
    }


    public function store(Request $request)
    {
        return GuidanceRequest::create($request->all());
    }


    public function destroy(string $student_id)
    {
        return GuidanceRequest::find($student_id)->delete();
    }
}
