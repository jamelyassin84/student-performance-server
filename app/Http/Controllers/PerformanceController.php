<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
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

        foreach ($performances as $performance) {
            Performance::find($performance->id)->delete();
        }


        return Performance::create($request->all());
    }


    public function show(string $id)
    {
        return Performance::where('student_id', $id)->get();
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
