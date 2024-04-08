<!php

@extends('layouts.app')

@section('title-block') Visited Pages @endsection

@section('content')
    <div class="container mt-3 mb-3 col-6 ">
        <h2 class="text-light mb-3 text-center">Visited Pages</h2>
        <ul class="list-group">
            @foreach($visitedPages as $key => $page)
                <li class="list-group-item list-group-item-dark">
                    <span class="badge bg-primary">{{ $key + 1 }}</span>
                    {{ $page }}
                </li>
            @endforeach
        </ul>
        <form method="POST" action="{{ route('clear.visited') }}" class="text-center">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Clear Visited Pages</button>
        </form>
    </div>
@endsection
