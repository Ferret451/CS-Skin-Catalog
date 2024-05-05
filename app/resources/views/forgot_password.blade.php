@extends('layouts.app')

@section('title-block') @lang('title.forgot-password') @endsection

@section('content')
    <div class="container">
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

            @if(session('status'))
                <div class="alert alert-info mt-3"> @lang('forgot-password.mail-sent-message')</div>
            @endif

            <div class="col-md-6 m-4">
                <div class="card bg-dark text-light">
                    <div class="card-header"> @lang('title.reset-password') </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">@lang('forgot-password.email')</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="container text-center">
                                <button type="submit" class="btn btn-primary mt-2">@lang('forgot-password.send-link')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
