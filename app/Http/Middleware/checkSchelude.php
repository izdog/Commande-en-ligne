<?php

namespace App\Http\Middleware;

use App\Schelude;
use Carbon\Carbon;
use Closure;

class checkSchelude
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tz = 'Europe/Paris';
        $now = Carbon::now($tz)->subHour();
        $dayOfWeek = $now->dayOfWeek;
        $day = $now->day;
        $scheludes = Schelude::where('id', $dayOfWeek)->get(['morning_start', 'morning_end', 'evening_start', 'evening_end'])->first();
        $morning_start = Carbon::createFromFormat('Y-m-d H:i:s', $now->year.'-'.$now->month.'-'.$day.' '.$scheludes->morning_start, $tz);
        $morning_end =  Carbon::createFromFormat('Y-m-d H:i:s', $now->year.'-'.$now->month.'-'.$day.' '.$scheludes->morning_end, $tz);
        $evening_start =  Carbon::createFromFormat('Y-m-d H:i:s', $now->year.'-'.$now->month.'-'.$day.' '.$scheludes->evening_start, $tz);
        $evening_end =  Carbon::createFromFormat('Y-m-d H:i:s', $now->year.'-'.$now->month.'-'.$day.' '.$scheludes->evening_end, $tz);

//        dd($now->between($evening_start, $evening_end), $morning_end, $now);
        if($now->between($morning_start, $morning_end) || $now->between($evening_start, $evening_end)):
            return $next($request);
        else:
            return redirect('/')->with('error', 'OUILLLE');
        endif;
    }

}
