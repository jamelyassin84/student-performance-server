<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('log_out');
    }

    public function login(LoginRequest $request)
    {
        $user = (object) $request->only(['email', 'password']);

        $data = User::where('email', $user->email)
            ->first();

        if (empty($data)) return response('User not Found', 404);

        if (!Hash::check($user->password, $data->password)) return response('Invalid Password', 401);

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

    public function register()
    {
        return redirect()->action([StudentController::class, 'store']);
    }
}
