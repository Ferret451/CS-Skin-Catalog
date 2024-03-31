<!php

@extends('layouts.app')

@section('title-block') Visited Pages @endsection

@section('content')
    <ul>
        @foreach($visitedPages as $page)
            <li class="text-light">{{ $page }}</li>
        @endforeach
    </ul>
@endsection
