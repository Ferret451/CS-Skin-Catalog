@extends('layouts.app')

@section('title-block') @lang('title.catalog') @endsection

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-2">
            @foreach ($products as $product)
                <div class="col mb-4">
                    <div class="card bg-dark text-light h-100">
                        <a href="{{ route('lot.show', ['id' => $product['hash_name']]) }}">
                            <img src="{{ $product['icon_url'] }}" class="card-img-top" alt="{{ $product['hash_name'] }}">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product['hash_name'] }}</h5>
                            <p class="card-text">{{ $product['sell_price_text'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-2 mb-2">
            <div class="col text-end">
                <a href="{{ route('catalog', ['page' => $prev_page]) }}" class="btn bg-dark text-light">
                    <i class="bi bi-arrow-left" style="font-size: 1.5rem"></i>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('catalog', ['page' => $next_page]) }}" class="btn bg-dark text-light">
                    <i class="bi bi-arrow-right" style="font-size: 1.5rem"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
