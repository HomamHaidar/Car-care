<?php
namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


Class LoginController extends Controller
{

    public function loginWithEmail(LoginRequest $request)
    {
        $credentials  = [
            'email' => $request->email,
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
    public function loginWithPhone(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required|string',
        ]);
        $user = User::where('phone', $validatedData['phone'])->first();

        if (!$user) {
            return response()->json(['message' => 'These credentials do not match our records.'], 404);
        }
            $user->generateCode();
            $user->save();

            $message = "Your OTP is " . $user->code;
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create('+2'.$user->phone, [
                'from' => $twilio_number,
                'body' => $message,
            ]);

            return response()->json(['message' => 'OTP sent Successfully To Your Phone'], 201);
        }
 }