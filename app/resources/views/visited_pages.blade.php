<!php

@extends('layouts.app')

@section('title-block') @lang('title.visited-pages') @endsection

@section('content')
    <div class="container mt-3 mb-3 col-6">
        <h2 class="text-light mb-3 text-center">@lang('title.visited-pages')</h2>
        <ul class="list-group">
            @foreach($visitedPages as $key => $page)
                <li class="list-group-item list-group-item-dark">
                    <span class="badge bg-primary">{{ $key + 1 }}</span>
                    {{ $page['pageName'] }} - {{ $page['time'] }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
