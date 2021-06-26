<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\General;
use App\Helpers\Router;
use App\Repositories\EmailSubscribe;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        menuTag('home');
        return view('page.frontend.home.home');
    }

    public function postEmailSubscribe(Request $request)
    {
        $valid = Validator::make($request::all(), [
            'search_footer' => 'required|email|min:1|max:255',
        ]);

        if ($valid->fails()) {
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
        } else {
            $email = request('search_footer');
            $date = date('Y-m-d', strtotime(General::dateNow()));

            $save = new EmailSubscribe();
            $save->date_subscribe = $date;
            $save->email = $email;
            $save->save();

            if (!empty($save->id)) {
                return Router::redirectBackFooter('Your request will be forwarded to our team.', 'info', true);
            } else {
                return Router::redirectBackFooter('Oops, something went wrong', 'danger', true);
            }
        }
    }
}
