<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminPasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('admin.guest');
    }

    public function showResetForm(Request $request, $token)
    {
        $pageTitle = "Account Recovery";
        $resetToken = AdminPasswordReset::where('token', $token)->first();

        if (!$resetToken) {
            $notify[] = ['error', 'Verification code mismatch'];
            return to_route('admin.password.reset')->withNotify($notify);
        }
        $email = $resetToken->email;
        return view('admin.auth.passwords.reset', compact('pageTitle', 'email', 'token'));
    }

    public function reset(Request $request){

        $request->validate([
            'password' => 'required|confirmed|min:6' 
        ]);

        $reset = AdminPasswordReset::where('token', $request->token)->orderBy('created_at', 'desc')->first();
        $admin = Admin::where('email', $reset->email)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();

        // Delete all password reset token of this email
        AdminPasswordReset::where('token', $request->token)->delete();

        $notify[] = ['success', 'Password changed'];
        return to_route('admin.login')->withNotify($notify);
    }
}