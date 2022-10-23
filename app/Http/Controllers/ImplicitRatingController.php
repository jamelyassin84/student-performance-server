<?php

namespace App\Http\Controllers;

use App\Models\ImplicitRating;
use App\Models\ImplicitRatingRecommendation;
use Illuminate\Http\Request;

class ImplicitRatingController extends Controller
{

    public function index()
    {
        return ImplicitRating::with('recommendations')->get();
    }

    public function store(Request $request)
    {
        $form = $request->all();
        $recommendations = collect();
        $implicitRating = ImplicitRating::create($form);

        foreach ($form['recommendations'] as $recommendation) {
            $recommendations->push(
                ImplicitRatingRecommendation::create([
                    'title' => $recommendation->title,
                    'implicit_rating_id' =>  $implicitRating->id
                ])
            );
        }

        $implicitRating->recommendations = $recommendations;
        return  $implicitRating;
    }

    public function update(Request $request, string $id)
    {
        $this->destroy($id);
        $this->store($request);
    }


    public function destroy(string $id)
    {
        $recommendations = ImplicitRatingRecommendation::where('implicit_rating_id', $id)->get();
        foreach ($recommendations as $recommendation) {
            $recommendation->delete();
        }

        return  ImplicitRatingRecommendation::find($id)->delete();;
    }
}
