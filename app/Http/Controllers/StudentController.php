<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index()
    {
        return Student::all();
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

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data =  Student::find($student->id);

        $data->fill($request)->save();
    }

    public function destroy(Student $student)
    {
        return Student::find($student->id)->delete();
    }
}
