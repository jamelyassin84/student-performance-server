<?php

namespace App\Http\Controllers;

use App\Models\SurveyForm;
use App\Http\Requests\StoreSurveyFormRequest;
use App\Http\Requests\UpdateSurveyFormRequest;
use Illuminate\Http\Request;

class SurveyFormController extends Controller
{

    public function index()
    {
        return SurveyForm::with('questions')->get();
    }

    public function store(Request $request)
    {
        return SurveyForm::create($request->all());
    }

    public function show($id)
    {
        return SurveyForm::findOrFail($id)->with('questions');
    }

    public function update(Request $request, $id)
    {
        $form  = SurveyForm::findOrFail($id);

        $form->fill($request->all())->save();

        return $form;
    }

    public function destroy($id)
    {
        return SurveyForm::find($id)->delete();
    }
}
