@extends('layouts.app')

@section('title-block') @lang('title.register') @endsection

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

            <div class="col-md-6 m-2">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        @lang('title.register')
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.try') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">@lang('register.name')</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">@lang('register.email')</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">@lang('register.password')</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">@lang('register.confirm-password')</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="container text-center">
                                <button type="submit" class="btn btn-primary mt-2">@lang('title.register')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="{{ route('login') }}" class="btn btn-secondary m-2">@lang('register.sign-in')</a>

        </div>
    </div>
@endsection
