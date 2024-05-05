<h1>Password Reset Request</h1>
<p>Hello,</p>
<p>You are receiving this email because we received a password reset request for your account.</p>
<p>If you did not request a password reset, no further action is required.</p>
<p>To reset your password, click on the following link:</p>
<a href="{{ route('password.reset', ['email' => $email, 'token' => $token]) }}">Reset Password</a>
<p>Thank you.</p>

