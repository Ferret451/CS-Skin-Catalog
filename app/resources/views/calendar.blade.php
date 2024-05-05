@extends('layouts.app')

@section('title-block') @lang('title.catalog') @endsection

@section('content')
    <div class="container">
        <h1 class="mt-2 mb-2 text-light">{{ $monthName }}, {{ $currentYear }}</h1>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <div class="row">
                            @foreach ($weekdays as $weekday)
                                <div class="col">
                                    <h6 class="card-title">{{ $weekday }}</h6>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($weekdays as $weekday)
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        @foreach ($dates as $day)
                                            @if ($day['dayOfWeek'] === $weekday)

                                                <div class="card  mt-2 mb-2" data-bs-toggle="tooltip" title="{{ $day['description'] }}">
                                                    <div class="card-body @if ($day['isTransition']) bg-secondary @endif">
                                                        <h6 class="card-title @if ($day['description']) text-primary @endif">
                                                            {{ $day['date']->format('M d') }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6 text-end">
                <a href="{{ route('calendar', ['month' => $prevMonth, 'year' => $prevMonth == 12 ? $currentYear - 1 : $currentYear]) }}" class="btn bg-dark text-light">
                    <i class="bi bi-arrow-left" style="font-size: 1.5rem"></i>
                </a>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('calendar', ['month' => $nextMonth, 'year' => $nextMonth == 1 ? $currentYear + 1 : $currentYear]) }}" class="btn bg-dark text-light">
                    <i class="bi bi-arrow-right" style="font-size: 1.5rem"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
