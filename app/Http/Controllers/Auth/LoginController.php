<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($loginField, $request->login)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'Invalid credentials.']);
        }

        // OTP Expire Time
        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(5);
        $user->save();

        Mail::to($user->email)->send(new OtpMail($otp));

        return view('auth.otp', ['email' => $user->email]);
    }

    public function verifyOtp(Request $request)
    {
        $user = User::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$user || now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP is invalid or expired.']);
        }

        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
