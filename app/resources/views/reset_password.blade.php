@extends('layouts.app')

@section('title-block') Forgot password @endsection

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

            <div class="col-md-6 m-4">
                <div class="card bg-dark text-light">
                    <div class="card-header"> Password reset </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update', ['email' => $email, 'token' => $token]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="container text-center">
                                <button type="submit" class="btn btn-primary mt-2">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
