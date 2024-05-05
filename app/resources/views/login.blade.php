@extends('layouts.app')

@section('title-block') @lang('title.login') @endsection

@section('content')
    <div class="container">
        <div class="d-flex flex-column align-items-center">

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
                <div class="alert alert-info mt-3">@lang('login.password-changed')</div>
            @endif

            <div class="col-md-6 m-2">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        @lang('title.login')
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.try') }}">
                            @csrf

                            <div class="form-group">
                                <label for="login-email">@lang('login.email')</label>
                                <input type="email" id="login-email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="login-password">@lang('login.password')</label>
                                <input type="password" id="login-password" name="password" class="form-control" required>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">@lang('login.remember')</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group  text-end">
                                        <a class="link" href=" {{route('password.request')}} ">@lang('login.forgot-password')</a>
                                    </div>
                                </div>
                            </div>

                            <div class="container text-center">
                                <button type="submit" class="btn btn-primary mt-2">@lang('title.login')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="{{ route('register') }}" class="btn btn-secondary m-2">@lang('login.sign-up')</a>

        </div>
    </div>
@endsection
