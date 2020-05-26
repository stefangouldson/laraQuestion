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

        $user->token_2fa = '5555';
        $user->save();


        // If you want to use email instead just
        // send an email to the user here ..

        return redirect('/2fa');
    }
}
