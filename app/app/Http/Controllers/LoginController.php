<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
    function login(LoginRequest $req) {
        $credentials = $req->only('email-log', 'password-log');
        $credentials = [
            'email' => $credentials['email-log'],
            'password' => $credentials['password-log'],
        ];

        if (auth()->attempt($credentials)) {
            return redirect(route('user'));
        } else {
            return back()->withErrors([
                'email-log' => 'Invalid email or password',
            ]);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('sign'));
    }
}
