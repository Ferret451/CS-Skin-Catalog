@extends('layouts.app')

@section('title-block') Edit User @endsection

@section('content')
    <div class="container m-4">
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h3>Edit User</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.user.update', ['userId' => $user->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection

