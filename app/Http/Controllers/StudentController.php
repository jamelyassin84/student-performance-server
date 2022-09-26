<?php

namespace App\Http\Controllers;

use App\Enums\UserEnum;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\GuidanceRequest;
use App\Models\Performance;
use App\Models\SurveyQuestions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        return User::with('student')->with('performances')->get();
    }

    public function store(StoreStudentRequest $request)
    {
        $user = $request->user();

        return Student::create([$request->all(), ['user_id' => $user->id]]);
    }

    public function show(Student $student)
    {
        return Student::find($student->id);
    }

    public function update(Request $request, $id)
    {
        $data = (object) $request->all();

        $user = User::find($id);

        $user->update([
            'email' => $user->email,
            'type' => UserEnum::STUDENT,
            'password' => Hash::make($user->password)
        ]);

        $student = Student::where('user_id', $user->id)->first();

        $student->update([
            'name' => $data->name,
            'sex' => $data->sex,
            'phone' => $data->phone,
            'department' => $data->department,
            'degree' => $data->degree,
            'course' => $data->course,
            'major' => $data->major,
            'address' => $data->address,
        ]);

        $user->student = $student;

        return $user;
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return Student::where('user_id', $id)->delete();
    }

    public function analytics()
    {
        $total_surveys = count(Performance::all());

        $registered_student = count(Student::all());

        $answered_student = count(
            GuidanceRequest::all()->filter(function (GuidanceRequest $request) {
                return $request->student !== null;
            })
        );

        $surveyQuestions = count(SurveyQuestions::all());

        return [
            'total_surveys' => $total_surveys,
            'registered_student' => $registered_student,
            'answered_student' => $answered_student,
            'surveyQuestions' => $surveyQuestions,
        ];
    }
}
