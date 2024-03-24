<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    function register(RegisterRequest $req) {
        $user = new User();
        $user->name = $req->input('name-reg');
        $user->email = $req->input('email-reg');
        $user->password = Hash::make($req->input('password-reg'));

        $user->save();

        auth()->login($user);

        return redirect()->route('user');
    }
}
