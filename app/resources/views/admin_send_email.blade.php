@extends('layouts.app')

@section('title-block') Send email @endsection

@section('content')
    <div class="container m-2">
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h4>Send Email</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.user.sendEmail', ['userId' => $user->id]) }}">
                    @csrf

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="sendToAll">Send to All:</label>
                        <input type="checkbox" id="sendToAll" name="sendToAll">
                    </div>

                    <button type="submit" class="btn btn-primary">Send Email</button>
                </form>
            </div>
        </div>
    </div>
@endsection
