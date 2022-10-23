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
        $recommendations = collect();
        $form =  $request->all();
        $implicitRating = ImplicitRating::create($form);

        foreach ($form['recommendations'] as $recommendation) {
            $data =   ImplicitRatingRecommendation::create([
                'title' => $recommendation['title'],
                'implicit_rating_id' =>  $implicitRating->id
            ]);

            $recommendations->push(
                $data
            );
        }

        $implicitRating->recommendations = $recommendations;

        return  $implicitRating;
    }

    public function update(Request $request, string $id)
    {
        $this->destroy($id);
        return  $this->store($request);
    }


    public function destroy(string $id)
    {
        $recommendations = ImplicitRatingRecommendation::where('implicit_rating_id', $id)->get();

        foreach ($recommendations as $recommendation) {
            $recommendation->delete();
        }

        return  ImplicitRating::findOrFail($id)->delete();;
    }
}
