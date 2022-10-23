<?php

namespace App\Http\Controllers;

use App\Models\ImplicitRatingRecommendation;
use Illuminate\Http\Request;

class ImplicitRatingRecommendationController extends Controller
{
    public function store(Request $request)
    {
        return ImplicitRatingRecommendation::create($request->all());
    }

    function destroy(string $id)
    {
        return ImplicitRatingRecommendation::find($id)->delete();
    }
}
