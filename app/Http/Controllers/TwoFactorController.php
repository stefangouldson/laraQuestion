<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function verifyTwoFactor(Request $request)
    {
        $request->validate([
            '2fa' => 'required',
        ]);

        if($request->input('2fa') == Auth::user()->token_2fa){
            $user = Auth::user();
            $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(config('session.lifetime'));
            $user->save();
            return redirect('/home');
        } else {
            return redirect()->to('login')->with('message', 'Incorrect code.');
        }
    }

    public function showTwoFactorForm()
    {
        return view('auth.two_factor');
    }
}
