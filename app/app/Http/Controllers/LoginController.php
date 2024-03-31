<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller {
    function login(LoginRequest $req) {
        $credentials = $req->only('email', 'password');
        $credentials = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ];

        if (auth()->attempt($credentials, $req->has('remember'))) {
            return redirect(route('user'));
        } else {
            return back()->withErrors([
                'email' => 'Invalid email or password',
            ])->withInput();
        }
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $cookie = Cookie::forget('session-cookie');
        return redirect(route('sign'))->withCookie($cookie);
    }
}
