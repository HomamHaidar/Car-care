<?php
namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ForgetPassword;
use Illuminate\Validation\ValidationException;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPassword $request)
    {
        $validatedData = $request->validated();
        $user = User::where('phone', $validatedData['phone'])->first();
        if (!$user) {
            return response()->json(['message' => 'These credentials do not match our records.'], 404);
        }

        $user->generateCode();
        $user->save();

        $Message="Your OTP is ".$user->code;
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create('+2'.$user->phone,[
            'from' => $twilio_number,
            'body' => $Message
        ]);
        return response()->json(['message' => 'OTP sent Successfully To Your Phone'], 201);
    }
}