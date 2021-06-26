<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\General;
use App\Helpers\Router;
use App\Repositories\RegionRequest;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Controllers\Controller;

class RegionsController extends Controller
{
    public function getIndex()
    {
        menuTag('region');
        return view('page.frontend.region.region');
    }

    public function getDetail()
    {
        menuTag('region');
        return view('page.frontend.region.detail');
    }

    public function getAdd()
    {
        menuTag('region');
        return view('page.frontend.region.add');
    }

    public function postCitySave(Request $request)
    {
        $valid = Validator::make($request::all(), [
            'city' => 'required|string|min:1|max:255',
            'email' => 'required|email|min:1|max:255',
            'phone' => 'required|numeric',
        ]);

        if ($valid->fails()) {
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
        } else {
            $city = request('city');
            $email = request('email');
            $phone = request('phone');
            $date = date('Y-m-d', strtotime(General::dateNow()));

            $save = new RegionRequest();
            $save->date_request = $date;
            $save->city = $city;
            $save->email = $email;
            $save->phone = $phone;
            $save->save();

            if (!empty($save->id)) {
                return Router::redirectBack('Your request will be forwarded to our team.', 'info');
            } else {
                return Router::redirectBack('Oops, something went wrong', 'danger');
            }
        }
    }
}
