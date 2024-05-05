@extends('layouts.app')

@section('title-block') @lang('title.send-email') @endsection

@section('content')
    <div class="container m-2">
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h4>@lang('title.send-email')</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.user.sendEmail', ['userId' => $user->id]) }}">
                    @csrf

                    <div class="form-group">
                        <label for="message">@lang('send-email.message')</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="sendToAll">@lang('send-email.send-to-all')</label>
                        <input type="checkbox" id="sendToAll" name="sendToAll">
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('title.send-email')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
