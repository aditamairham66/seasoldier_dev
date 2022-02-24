<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\ContactUs;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function getIndex()
    {
        menuTag('contact');
        return view('page.frontend.contact.contact', [
            'is_mobile' => isMobile(),
            'email' => CRUDBooster::getSetting('contact_us_email'),
            'instagram' => CRUDBooster::getSetting('contact_us_instagram'),
            'wa' => CRUDBooster::getSetting('contact_us_wa'),
        ]);
    }

    public function postSave(Request $request)
    {
        $valid = Validator::make($request::all(), [
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
                CRUDBooster::sendNotification([
                    'content' => 'New Contact Us',
                    'to' => CRUDBooster::adminPath('contact-us'),
                    'id_cms_users' => [1, 2]
                ]);

                Mail::send('email/mail-contact', [
                    'email' => $email
                ], function ($message) use ($email) {
                    $message->to('info@seasoldier.org')->subject('New Contact Us');
                    $message->from('info@seasoldier.org', 'SEASOLDIER');
                });

                $msg = 'Thank you for the advice you have given us, our team will process it soon.';
                $type = 'info';
                return redirect()->back()->with(['msg' => $msg, 'msg_type' => $type]);
            } else {
                $msg = 'Oops, something went wrong';
                $type = 'danger';
                return redirect()->back()->with(['msg' => $msg, 'msg_type' => $type])->withInput();
            }
        }
    }
}
