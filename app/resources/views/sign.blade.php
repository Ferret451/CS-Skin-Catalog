@extends('layouts.app')

@section('title-block') Sign @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 mt-2">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login-form') }}">
                            @csrf
                            <div class="form-group">
                                <label for="login-email">Email</label>
                                <input type="email" id="login-email" name="email-log" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="login-password">Password</label>
                                <input type="password" id="login-password" name="password-log" class="form-control" required>
                            </div>

                            @if($errors->has('email-log') || $errors->has('password-log'))
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li> {{$error}} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 m-2">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        Register
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register-form') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name-reg" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email-reg" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password-reg" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation-reg" class="form-control" required>
                            </div>

                            @if($errors->has('name-reg') || $errors->has('email-reg') || $errors->has('password-reg') || $errors->has('password_confirmation-reg'))
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li> {{$error}} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary mt-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
