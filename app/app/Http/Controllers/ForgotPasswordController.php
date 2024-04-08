<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class ForgotPasswordController extends Controller
{
    public function create(Request $req) {
        return view('forgot_password');
    }

    public function store(Request $req) {
        $user = User::where('email', $req->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => trans('passwords.user')]);
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );

        $resetLink = URL::route('password.reset', ['email' => $user->email, 'token' => $token]);

        Mail::send('reset_password_message', ['resetLink' => $resetLink, 'email' => $user->email, 'token' => $token], function ($message) use ($user) {
            $message->to($user->email)->subject('Reset Password');
        });

        return back()->with('status', trans('passwords.sent'));
    }
}
