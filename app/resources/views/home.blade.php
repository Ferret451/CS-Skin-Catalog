@extends('layouts.app')

@section('title-block') Home @endsection

@section('content')
    <main>
        <section class="container row mt-5 info-section" id="general-info">
            <div class="container col-8 text-light">
                <h2>About</h2>
                <p class="fs-4 mt-2">
                    {!! $about !!}
                    @lang('')
                </p>
                <a href="{{ route('catalog') }}" class="btn bg-dark text-light">Go to catalog</a>
            </div>
            <div class="container col-4 d-flex justify-content-center">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMS4cQGFUbMMXjlRWRxGPoiZlKNZw5VYjSLg&usqp=CAU"
                    alt="Skins"
                    class="w-100 rounded-5 shadow"
                >
            </div>
        </section>

        <section class="container row mt-5 info-section" id="popular-skins">
            <div class="container col-4 d-flex justify-content-center">
                <img
                    src="https://t3.ftcdn.net/jpg/03/48/39/74/360_F_348397404_wXuf22GUPNAh67htBZZnaDSx3Bj92yep.jpg"
                    alt="API"
                    class="w-100 rounded-5 shadow"
                >
            </div>
            <div class="container col-8 text-light p-0">
                <h2>For developers</h2>
                <p class="fs-4 mt-2">
                    {!! $forDevsDesc !!}
                </p>
                <div class="container text-center">
                    <div class="border rounded p-3 shadow bg-dark">
                        <a href="{{route('redirect', ['url' => urlencode("https://steamcommunity.com/market/search/render?norender=1&start=1&count=99&appid=730")])}}" class="d-block text-decoration-none">
                            {!! $apiLink !!}
                        </a>
                    </div>
                </div>
                <p class="fs-4 mt-2">
                    {!! $githubDesc !!}
                </p>
                <div class="container text-center">
                    <div class="border rounded p-3 shadow bg-dark">
                        <a href="{{route('redirect', ['url' => urlencode("https://github.com/Revadike/InternalSteamWebAPI/wiki")])}}" class="d-block text-decoration-none">
                            {!! $githubLink !!}
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="container row mt-5 mb-5 info-section" id="general-info">
            <div class="container col-8 text-light">
                <h2>Contact</h2>
                <p class="fs-4 mt-2">
                    {!! $emailDesc !!}
                </p>
                <div class="container text-center">
                    <div class="border rounded p-3 shadow bg-dark">
                        <p class="fs-6 mb-0"> {!! $email !!} </p>
                    </div>
                </div>
                <p class="fs-4 mt-2">
                    {!! $phoneDesc !!}
                </p>
                <div class="container text-center">
                    <div class="border rounded p-3 shadow bg-dark">
                        <p class="fs-6 mb-0"> {!! $phone !!} </p>
                    </div>
                </div>
            </div>
            <div class="container col-4 d-flex justify-content-center">
                <img
                    src="https://img.freepik.com/free-photo/hot-line-contact-us-call-center-search-interface_53876-124009.jpg?size=626&ext=jpg&ga=GA1.1.2082370165.1711065600&semt=ais"
                    alt="Contact"
                    class="w-100 rounded-5 shadow"
                >
            </div>
        </section>
    </main>
@endsection
