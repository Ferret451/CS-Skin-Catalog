@extends('layouts.app')

@section('title-block') @lang('title.user') @endsection

@section('content')
    <div class="container m-4">
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h3>@lang('user.profile')</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>@lang('user.name')</strong> {{ $user->name }}</li>
                    <li class="list-group-item"><strong>@lang('user.email')</strong> {{ $user->email }}</li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('logout') }}" class="btn btn-danger">@lang('user.logout')</a>
            </div>
        </div>
    </div>
@endsection
