<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestions;
use App\Http\Requests\StoreSurveyQuestionsRequest;
use App\Http\Requests\UpdateSurveyQuestionsRequest;

class SurveyQuestionsController extends Controller
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
     * @param  \App\Http\Requests\StoreSurveyQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurveyQuestionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyQuestions  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyQuestions $surveyQuestions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyQuestions  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyQuestions $surveyQuestions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSurveyQuestionsRequest  $request
     * @param  \App\Models\SurveyQuestions  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurveyQuestionsRequest $request, SurveyQuestions $surveyQuestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyQuestions  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyQuestions $surveyQuestions)
    {
        //
    }
}
