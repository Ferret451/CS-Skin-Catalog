<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function create(Request $request, $email, $token) {
        return view('reset_password')->with(
            ['email' => $email, 'token' => $token]
        );
    }

    public function update(Request $request, $email, $token) {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('password.request')->with('error', 'Invalid email address');
        }

        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$resetRecord) {
            return redirect()->route('password.request')->with('error', 'Invalid password reset link');
        }

        if (strtotime($resetRecord->created_at) < strtotime('-1 hour')) {
            return redirect()->route('password.request')->with('error', 'Password reset link has expired');
        }

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('login')->with('success', 'Password has been reset successfully');
    }
}
