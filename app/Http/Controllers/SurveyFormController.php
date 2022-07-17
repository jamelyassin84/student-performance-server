<?php

namespace App\Http\Controllers;

use App\Models\SurveyForm;
use App\Http\Requests\StoreSurveyFormRequest;
use App\Http\Requests\UpdateSurveyFormRequest;

class SurveyFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSurveyFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurveyFormRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyForm  $surveyForm
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyForm $surveyForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyForm  $surveyForm
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyForm $surveyForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSurveyFormRequest  $request
     * @param  \App\Models\SurveyForm  $surveyForm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurveyFormRequest $request, SurveyForm $surveyForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyForm  $surveyForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyForm $surveyForm)
    {
        //
    }
}
