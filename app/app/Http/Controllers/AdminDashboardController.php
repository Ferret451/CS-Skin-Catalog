<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('admin_dashboard', ['users' => $users]);
    }

    public function editUser($userId)
    {
        $user = User::findOrFail($userId);

        return view('admin_edit_user', ['user' => $user]);
    }

    public function updateUser(Request $request, $userId)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::findOrFail($userId);
        $user->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully!');
    }

    public function sendEmailForm($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin_send_email', ['user' => $user]);
    }

    public function sendEmail(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        if ($request->has('sendToAll') && $request->get('sendToAll')) {
            $users = User::all();

            foreach ($users as $recipient) {
                if ($recipient->role == "admin")
                    continue;

                Mail::send('user_message', ['nick' => $recipient->name, 'email' => $recipient->email, 'mess' => $request->message],
                    function ($message) use ($recipient) {
                        $message->to($recipient->email)->subject('Notification');
                    }
                );
            }

            $message = 'Email sent to all users successfully!';
        } else {
            Mail::send('user_message', ['nick' => $user->name, 'email' => $user->email, 'mess' => $request->message],
                function ($message) use ($user) {
                    $message->to($user->email)->subject('Notification');
                }
            );

            $message = 'Email sent to ' . $user->email . ' successfully!';
        }

        return redirect()->route('admin.dashboard')->with('success', $message);
    }
}
