<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Router;
use App\Repositories\ContactUs;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        menuTag('contact');
        return view('page.frontend.contact.contact');
    }

    public function postSave(Request $request)
    {
        $valid = Validator::make($request::all(), [
//            'email' => 'required|email|unique:contact_us|min:1|max:255',
            'email' => 'required|email|min:1|max:255',
            'message' => 'required|string|max:5000|min:10'
        ]);

        if ($valid->fails()) {
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
        } else {
            $email = request('email');
            $message = request('message');

            $save = new ContactUs();
            $save->email = $email;
            $save->message = $message;
            $save->save();

            if (!empty($save->id)) {
                return Router::redirectBack('Thank you for the advice you have given us, our team will process it soon.', 'info');
            } else {
                return Router::redirectBack('Oops, something went wrong', 'danger');
            }
        }
    }
}
