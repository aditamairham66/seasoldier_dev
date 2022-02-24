<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\General;
use App\Helpers\Router;
use App\Repositories\EmailSubscribe;
use App\Repositories\HomeBanner;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function getIndex()
    {
        menuTag('home');
        $is_mobile = isMobile();

        return view('page.frontend.home.home', [
            'is_mobile' => $is_mobile,
            'banner' => ($is_mobile ? HomeBanner::getAllMobile() : HomeBanner::getAllDesktop()),
            // 'banner_desktop' => HomeBanner::getAllDesktop(),
            // 'banner_mobile' => HomeBanner::getAllMobile(),
            // 'banner' => HomeBanner::getAll()
        ]);
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
                CRUDBooster::sendNotification([
                    'content' => 'New Subscribe',
                    'to' => CRUDBooster::adminPath('email-subscribe'),
                    'id_cms_users' => [1, 2]
                ]);

                Mail::send('email/mail-subscribe', [
                    'email' => $email
                ], function ($message) use ($email) {
                    $message->to('info@seasoldier.org')->subject('New Subscribe');
                    $message->from('info@seasoldier.org', 'SEASOLDIER');
                });

                Router::redirectBackFooter('Your request will be forwarded to our team.', 'info');
            } else {
                Router::redirectBackFooter('Oops, something went wrong', 'danger');
            }

            return true;
        }
    }
}
