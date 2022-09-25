<?php

namespace App\Http\Controllers;

use App\Models\GuidanceRequest;
use App\Models\Performance;
use Illuminate\Http\Request;

class GuidanceRequestController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->all();

        $guidance_requests = collect(GuidanceRequest::with('student')
            ->with('student.performance')
            ->get());


        return  $guidance_requests->filter(function (GuidanceRequest $request) {
            return $request->student !== null;
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
