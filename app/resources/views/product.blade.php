@extends('layouts.app')

@section('title-block') {{$productInfo['name']}} @endsection

@section('content')
    <div class="container-fluid text-light py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-light">
                    <img src="{{ $productInfo['icon_url'] }}" alt="{{ $productInfo['name'] }}" class="card-img-top">
                    <div class="card-body">
                        <h1 class="card-title text-center">{{ $productInfo['name'] }}</h1>
                        <p class="card-text text-center"><strong>Sell Price:</strong> {{ $productInfo['sell_price_text'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
