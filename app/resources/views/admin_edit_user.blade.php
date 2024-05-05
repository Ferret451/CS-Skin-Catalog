@extends('layouts.app')

@section('title-block') @lang('title.edit-user') @endsection

@section('content')
    <div class="container m-4">
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h3>@lang('title.edit-user')</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.user.update', ['userId' => $user->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">@lang('edit-user.name')</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">@lang('edit-user.email')</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('edit-user.update-user')</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">@lang('edit-user.cancel')</a>
            </div>
        </div>
    </div>
@endsection

