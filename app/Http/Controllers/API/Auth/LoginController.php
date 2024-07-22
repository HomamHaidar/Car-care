<?php
namespace App\Http\Controllers\API\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


Class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials  = [
            $loginType => $request->login,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->code && now()->lessThanOrEqualTo($user->expire_at)) {
                Auth::logout();
                return response()->json(['message' => 'OTP verification required'], 403);
            }
            $token = $user->createToken('user',['app:all'])->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}