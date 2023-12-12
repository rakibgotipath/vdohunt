<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public $redirectTo = '/user/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token)
    {
        $pageTitle = "Account Recovery";
        $resetToken = PasswordReset::where('token', $token)->first();

        if (!$resetToken) {
            $notify[] = ['error', 'Verification code mismatch'];
            return to_route('password.reset')->withNotify($notify);
        }
        $email = $resetToken->email;
        return view('user.auth.passwords.reset', compact('pageTitle', 'email', 'token'));
    }

    public function reset(Request $request)
    {

        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        $reset = PasswordReset::where('token', $request->token)->orderBy('created_at', 'desc')->first();
        $user = User::where('email', $reset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete all password reset token of this email
        PasswordReset::where('token', $request->token)->delete();

        $notify[] = ['success', 'Password changed'];
        return to_route('login')->withNotify($notify);
    }
}
