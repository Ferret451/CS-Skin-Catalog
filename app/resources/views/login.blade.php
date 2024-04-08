@extends('layouts.app')

@section('title-block') Login @endsection

@section('content')
    <div class="container justify-content-center">
        <div class="row justify-content-center">

            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-info mt-3">Password has changed successfully!</div>
            @endif

            <div class="col-md-6 m-2">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.try') }}">
                            @csrf

                            <div class="form-group">
                                <label for="login-email">Email</label>
                                <input type="email" id="login-email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="login-password">Password</label>
                                <input type="password" id="login-password" name="password" class="form-control" required>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Remember</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group  text-end">
                                        <a class="link" href=" {{route('password.request')}} ">Forgot Password</a>
                                    </div>
                                </div>
                            </div>

                            <div class="container text-center">
                                <button type="submit" class="btn btn-primary mt-2">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="{{ route('register') }}" class="btn btn-primary m-2">Sign in</a>

        </div>
    </div>
@endsection
