<?php

namespace App\Http\Controllers\Frontend;

use App\Services\DonationFundraisingService;
use App\Services\DonationMerchandiseService;
use App\Services\DonationPartnerService;
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
        $data = [];
        $data['data'] = DonationFundraisingService::listAll();
        return view('page.frontend.donation.fundraising', $data);
    }

    public function getPartner()
    {
        menuTag('donation');
        $data = [];
        $data['data'] = DonationPartnerService::listAll();
        return view('page.frontend.donation.partner', $data);
    }

    public function getMerchandise()
    {
        menuTag('donation');
        $data = [];
        return view('page.frontend.donation.merchandise', $data);
    }

    public function postListMerchandise()
    {
        try {
            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = DonationMerchandiseService::listScroll();
        } catch (\Throwable $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
        }

        return response()->json($res);
    }
}
