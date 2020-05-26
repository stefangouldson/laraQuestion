<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->token_2fa_expiry > \Carbon\Carbon::now()){
            return $next($request);
        }

        $token = mt_rand(10000,99999);
        $user->token_2fa =strval($token);
        $user->save();


        // If you want to use email instead just
        // send an email to the user here ..

        return redirect('/2fa');
    }
}
