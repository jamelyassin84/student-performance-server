<?php

namespace App\Http\Controllers;

use App\Enums\UserEnum;
use App\Http\Requests\LoginRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['log_out']);
    }

    public function login(LoginRequest $request)
    {
        $user = (object) $request->only(['email', 'password']);

        $data = User::where('email', $user->email)
            ->first();

        if (empty($data)) return response('User not Found', 404);

        if (!Hash::check($user->password, $data->password)) return response('Invalid Password', 404);

        return self::user($data);
    }

    protected static function user($user)
    {
        return [
            'user' => $user,
            'token' =>  self::updateToken($user->id),
            'message' => 'Signed-in',
        ];
    }

    protected static function updateToken($id, $abilities = ['*'])
    {
        $user = User::find($id)->first();

        $ip = request()->ip();

        $token = $user->createToken("{$user->name}|{$ip}", $abilities);

        $user->remember_token = null;

        $user->save();

        return $token;
    }

    public function log_out(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function register(Request $request)
    {
        $data = (object) $request->all();

        $data = User::where('email', $data->email)
            ->first();

        if (!empty($data)) return response('Email has already been taken', 402);

        $data = (object) $request->all();

        $user = User::create([
            'email' => $data->email,
            'type' => UserEnum::STUDENT,
            'password' => Hash::make($data->password)
        ]);

        $user->student =  Student::create([
            'user_id' => $user->id,

            'name' => $data->name,
            'sex' => $data->sex,
            'phone' => $data->phone,
            'department' => $data->department,
            'degree' => $data->degree,
            'course' => $data->course,
            'major' => $data->major,
            'address' => $data->address,
        ]);

        return  self::user($user);
    }
}
