@extends('layouts.app')

@section('title-block') @lang('title.admin-dashboard') @endsection

@section('content')
    <div class="container mt-2 mb-2 text-center">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h4>@lang('admin-dashboard.user-list')</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped bg-dark text-light">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('admin-dashboard.name')</th>
                        <th>@lang('admin-dashboard.email')</th>
                        <th>@lang('admin-dashboard.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td >
                                <div class="btn-group" role="group" aria-label="User Actions">
                                    <a href="{{ route('admin.user.edit', ['userId' => $user->id]) }}" class="btn btn-primary">@lang('admin-dashboard.edit')</a>
                                    <a href="{{ route('admin.user.sendEmailForm', ['userId' => $user->id]) }}" class="btn btn-success">@lang('admin-dashboard.send-email')</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
