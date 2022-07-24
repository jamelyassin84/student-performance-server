<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestions;
use App\Http\Requests\StoreSurveyQuestionsRequest;
use App\Http\Requests\UpdateSurveyQuestionsRequest;
use Illuminate\Http\Request;

class SurveyQuestionsController extends Controller
{

    public function index()
    {
        return SurveyQuestions::get();
    }

    public function store(Request $request)
    {
        return SurveyQuestions::create($request->all());
    }

    public function show(string $id)
    {
        return SurveyQuestions::findOrFail($id);
    }


    public function update(Request $request, string $id)
    {
        $questions  = SurveyQuestions::findOrFail($id);

        $questions->fill($request->all())->save();

        return $questions;
    }

    public function destroy(string $id)
    {
        return SurveyQuestions::find($id)->delete();
    }
}
