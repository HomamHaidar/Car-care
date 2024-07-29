<?php
namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class VerifyOtpLogin extends Controller
{
    public function verifyOtp(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
        ]);

        $user = User::where('phone', $validatedData['phone'])->first();

        if (!$user) {
            return response()->json(['message' => 'These credentials do not match our records.'], 404);
        }

        if ($user->validateCode($validatedData['code'])) {
            $user->code = null;
            $user->expire_at = null;
            $user->save();
            Auth::login($user);
            $token = $user->createToken('user', ['app:all'])->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token], 200);
        } else {
            return response()->json(['message' => 'Invalid or expired OTP'], 401);
        }
    }
}