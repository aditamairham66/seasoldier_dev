<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AuthFrontendMiddleware
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
        $key = request('key');
        if (!empty($key)) {
            $key = Crypt::decrypt($key);
            $id = $key['id'];
            $type = $key['type'];
            $link = $key['link'];

            /**
             * redirect to login if users not login
             */
            $users_id = getSessionDelegate('id');
            if (empty($users_id)) {
                Session::put('redirect_login', $link);
                return redirect()->action('FrontendAuth\LoginController@getIndex');
            }
        } else {
            /**
             * just redirect to login
             */
            return redirect()->action('FrontendAuth\LoginController@getIndex');
        }

        return $next($request);
    }
}
