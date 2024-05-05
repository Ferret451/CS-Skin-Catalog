@extends('layouts.app')

@section('title-block') User @endsection

@section('content')
    <div class="container m-4">
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h3>User Profile</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                    <!-- Другие данные пользователя, если есть -->
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
@endsection
