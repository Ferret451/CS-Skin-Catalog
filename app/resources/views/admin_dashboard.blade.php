@extends('layouts.app')

@section('title-block') Admin Dashboard @endsection

@section('content')
    <div class="container mt-2 mb-2 text-center">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h4>User List</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped bg-dark text-light">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
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
                                    <a href="{{ route('admin.user.edit', ['userId' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.user.sendEmailForm', ['userId' => $user->id]) }}" class="btn btn-success">Send Email</a>
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
