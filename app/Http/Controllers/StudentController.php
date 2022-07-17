<?php

namespace App\Http\Controllers;

use App\Enums\UserEnum;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // $data =  Student::find($student->id);

        // $data->fill($request)->save();
    }

    public function destroy(Student $student)
    {
        return Student::find($student->id)->delete();
    }
}
