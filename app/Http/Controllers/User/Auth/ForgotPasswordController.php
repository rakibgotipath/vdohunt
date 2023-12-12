<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\PasswordResetNotification;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        $pageTitle = 'Account Recovery';
        return view('user.auth.passwords.email', compact('pageTitle'));
    }

    public function sendResetCodeEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::whereEmail($request->email)->first();
        if (!$user) {
            $notify[] = ['error', 'Email Not Available'];
            return back()->withNotify($notify);
        }

        $userPasswordReset = PasswordReset::whereEmail($user->email)->first();
        if (!$userPasswordReset) {
            $code = verificationCode(6);
            $userPasswordReset = new PasswordReset();
            $userPasswordReset->email = $user->email;
            $userPasswordReset->token = $code;
            $userPasswordReset->created_at = date("Y-m-d h:i:s");
            $userPasswordReset->save();
        }

        $email = $user->email;
        session()->put('pass_res_mail', $email);

        $user->notify(new PasswordResetNotification($userPasswordReset->token));

        return to_route('password.code.verify');
    }

    public function codeVerify()
    {
        $pageTitle = 'Verify Code';
        $email = session()->get('pass_res_mail');
        if (!$email) {
            $notify[] = ['error', 'Oops! session expired'];
            return to_route('password.reset')->withNotify($notify);
        }
        return view('user.auth.passwords.code_verify', compact('pageTitle', 'email'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required']);
        $notify[] = ['success', 'You can change your password.'];
        $code = str_replace(' ', '', $request->code);
        return to_route('password.reset.form', $code)->withNotify($notify);
    }
}
