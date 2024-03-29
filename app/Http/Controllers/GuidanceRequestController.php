<?php

namespace App\Http\Controllers;

use App\Models\GuidanceRequest;
use App\Models\Performance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuidanceRequestController extends Controller
{

    public function index(Request $request)
    {
        $data =  $request->all();

        $builder = GuidanceRequest::with('student')->with('student.performance')->with('performances');

        if (isset($data['from']) || isset($data['to'])) {
            $builder->whereBetween('created_at', [$data['from'], $data['to']]);
        }

        $guidance_requests = collect($builder->get());

        return $guidance_requests->filter(function (GuidanceRequest $request) {
            $request->performance = collect($request->performances)
                ->where('year_level', $request->year_level)
                ->where('semester', $request->semester)
                ->first();

            return true;
        })->toArray();
    }

    public function show(string $student_id)
    {
        return  GuidanceRequest::where('student_id', $student_id)
            ->with('student')
            ->with('performance')
            ->get();
    }


    public function store(Request $request)
    {
        $data = (object) $request->all();

        if (isset($data->student_id)) {

            $performance = Performance::where(
                'student_id',
                $data->student_id
            )
                ->where('year_level', $data->year_level)
                ->where('semester', $data->semester)
                ->first();

            if (!empty($performance)) {
                $performance->has_requested = 1;
            }
        }

        return GuidanceRequest::updateOrCreate([
            'student_id' => $data->student_id,
            'year_level' => $data->year_level,
            'semester' => $data->semester,
        ]);
    }


    public function destroy(string $student_id)
    {
        return GuidanceRequest::find($student_id)->delete();
    }
}
