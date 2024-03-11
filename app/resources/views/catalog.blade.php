@extends('layouts.app')

@section('title-block') Catalog @endsection

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-4">
            @foreach ($products as $product)
                <div class="col  mb-4">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center min-w-[1rem]">
                            <p class="card-text">{{ $product['img'] }}</p>
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
