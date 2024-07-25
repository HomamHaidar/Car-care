<?php
namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{

    public function resetPassword(ResetPassword $request)
    {
        $validatedData = $request->validated();
        $user = User::where('phone', $validatedData['phone'])->first();
        if (!$user) {
            return response()->json(['message' => 'These credentials do not match our records.'], 404);
        }
        if (!$user->validateCode($validatedData['code'])) {
            return response()->json(['message' => 'Invalid or expired OTP'], 401);
        }
        $user->password = Hash::make($validatedData['password']);
        $user->code = null;
        $user->expire_at = null;
        $user->save();
        return response()->json(['message' => 'Password Reset Successfully'], 201);
    }
}
