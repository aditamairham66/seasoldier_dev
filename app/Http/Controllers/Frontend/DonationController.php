<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function getIndex()
    {
        menuTag('donation');
        return view('page.frontend.donation.donation');
    }

    public function getFundraising()
    {
        menuTag('donation');
        return view('page.frontend.donation.fundraising');
    }

    public function getPartner()
    {
        menuTag('donation');
        return view('page.frontend.donation.partner');
    }

    public function getMerchandise()
    {
        menuTag('donation');
        return view('page.frontend.donation.merchandise');
    }
}
