<?php

namespace App\Http\Controllers\Frontend;

use App\Services\DonationFundraisingService;
use App\Services\DonationMerchandiseService;
use App\Services\DonationPartnerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        menuTag('donation');
        return view('page.frontend.donation.donation');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFundraising()
    {
        menuTag('donation');
        return view('page.frontend.donation.fundraising');
    }

    public function postListFundraising()
    {
        try {
            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = DonationFundraisingService::listScroll();
        } catch (\Throwable $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
        }

        return response()->json($res);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPartner()
    {
        menuTag('donation');
        $data = [];
        $data['data'] = DonationPartnerService::listAll();
        return view('page.frontend.donation.partner', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMerchandise()
    {
        menuTag('donation');
        return view('page.frontend.donation.merchandise');
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
