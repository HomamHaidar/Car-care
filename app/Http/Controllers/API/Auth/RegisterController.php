<?php
namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $token = $user->createToken('user',['app:all'])->plainTextToken;

        $user->generateCode();
        Auth::login($user);

        $Message="Your OTP is ".$user->code;
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create('+2'.$user->phone,[
            'from' => $twilio_number,
            'body' => $Message
        ]);
        return response()->json(['message' => 'OTP sent Successfully To Your Phone' ,'token' => $token], 201);
    }
}