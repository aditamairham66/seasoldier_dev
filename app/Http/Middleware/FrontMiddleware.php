<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class FrontMiddleware
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
        $date_time = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $year = (int)date('Y');
        $month = (int)date('m');
        $day = (int)date('d');

        // save list
        DB::table('visitor_list')->insert([
            'created_at' => $date_time,
            'path' => request()->url(),
            'ip' => request()->ip(),
            'user_agent' => substr(request()->userAgent(), 0, 255),
            'date' => $date,
        ]);

        // create / update total
        $visitor = DB::table('visitor_counter')
            ->where('date', '=', $date)
            ->count();
        $total = DB::table('visitor_list')
            ->where('date', $date)
            ->count();
        if ($visitor === 0) {
            DB::table('visitor_counter')
                ->insertGetId([
                    'created_at' => $date_time,
                    'year' => $year,
                    'month' => $month,
                    'day' => $day,
                    'date' => $date,
                    'total' => $total
                ]);
        } else {
            DB::table('visitor_counter')
                ->where('date', '=', $date)
                ->update([
                    'updated_at' => $date_time,
                    'total' => $total
                ]);
        }

        return $next($request);
    }
}
