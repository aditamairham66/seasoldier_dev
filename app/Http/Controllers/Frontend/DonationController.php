<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function getIndex()
    {
        return view('page.frontend.donation.donation');
    }

    public function getFundraising()
    {
        return view('page.frontend.donation.fundraising');
    }

    public function getPartner()
    {
        return view('page.frontend.donation.partner');
    }

    public function getMerchandise()
    {
        return view('page.frontend.donation.merchandise');
    }
}
