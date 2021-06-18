<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class NonAuthFrontendMiddleware
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
        if(!empty(getSessionDelegate('id'))) {

            $url_prev = url()->previous();
            $url_prev = str_replace(url('/'), '', $url_prev);
            if ($request->segment(1) !== 'profile' && $request->segment(2) !== 'logout') {
                $exception = ['/login', '/register', '/forgot-password'];

                if (in_array($url_prev, $exception)) {
                    return redirect('/');
                } else {
                    return redirect('/');
                }
            }

        }
        return $next($request);
    }
}
