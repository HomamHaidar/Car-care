<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckOtp
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->code && now()->lessThanOrEqualTo($user->expire_at)) {
            return response()->json(['message' => 'OTP verification required'], 403);
        }

        return $next($request);
    }
}