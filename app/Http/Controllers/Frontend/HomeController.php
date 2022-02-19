<?php namespace App\Http\Controllers\Frontend;

use App\Helpers\General;
use App\Helpers\Router;
use App\Repositories\EmailSubscribe;
use App\Repositories\HomeBanner;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        menuTag('home');
        return view('page.frontend.home.home',[
            'banner' => HomeBanner::getAll()
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

                Router::redirectBackFooter('Your request will be forwarded to our team.', 'info');
            } else {
                Router::redirectBackFooter('Oops, something went wrong', 'danger');
            }

            return true;
        }
    }
}
