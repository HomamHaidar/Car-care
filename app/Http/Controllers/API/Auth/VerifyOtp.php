<?php
namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class VerifyOtp extends Controller
{
    public function verifyOtp(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
        ]);

        $user = $request->user();

        if ($user->validateCode($validated['code'])) {
            $user->code = null;
            $user->expire_at = null;
            $user->save();

            return response()->json(['message' => 'OTP verified'], 200);
        }

        return response()->json(['message' => 'Invalid OTP or OTP expired'], 401);
    }
}