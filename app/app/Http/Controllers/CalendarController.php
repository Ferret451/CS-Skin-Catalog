<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $req)
    {
        $today = Carbon::now();
        $currentMonth = $req->input('month', $today->month);
        $currentYear = $req->input('year', $today->year);

        $firstDayOfMonth = Carbon::createFromDate($currentYear, $currentMonth, 1);
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        $prevMonth = $firstDayOfMonth->copy()->subMonth()->month;
        $nextMonth = $firstDayOfMonth->copy()->addMonth()->month;
        $monthName = $firstDayOfMonth->format('F');

        $weekdays = trans('calendar.weekdays');
        $descriptions = [
            '2024-04-15' => 'Описание для 15 апреля',
            '2024-04-20' => 'Описание для 20 апреля',
        ];

        $dates = collect();
        $firstDay = $firstDayOfMonth->copy()->addDay()->startOfWeek()->subDay();
        $lastDay = $lastDayOfMonth->copy()->addDay()->endOfWeek()->subDay();
        for ($date = $firstDay->copy(); $date->lte($lastDay->copy()); $date->addDay()) {
            $isTransition = $date->lt($firstDayOfMonth->copy()->subDay()) || $date->gt($lastDayOfMonth);
            $dateKey = $date->format('Y-m-d');

            $dates->push([
                'date' => $date->copy(),
                'dayOfWeek' => $weekdays[$date->dayOfWeek],
                'isTransition' => $isTransition,
                'description' => $descriptions[$dateKey] ?? null,
            ]);
        }

//        dd($firstDayOfMonth);

        return view('calendar', compact('currentMonth', 'dates', 'monthName', 'weekdays', 'prevMonth', 'nextMonth', 'currentYear'));
    }
}
