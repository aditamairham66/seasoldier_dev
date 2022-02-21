<?php

namespace App\Http\Controllers\Frontend;

use App\Services\DonationMerchandiseService;
use App\Services\DonationPartnerService;
use App\Http\Controllers\Controller;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;
use Throwable;

class DonationController extends Controller
{
    public function getIndex()
    {
        menuTag('donation');
        return view('page.frontend.donation.donation', [
            'is_mobile' => isMobile(),
        ]);
    }

    public function getFundraising()
    {
        menuTag('donation');
        return view('page.frontend.donation.fundraising', [
            'is_mobile' => isMobile(),
            'data' => DB::table('donation_fundraising')
                ->orderBy('sort', 'ASC')
                ->get()
        ]);
    }

    public function getPartner()
    {
        menuTag('donation');
        return view('page.frontend.donation.partner', [
            'is_mobile' => isMobile(),
            'data' => DonationPartnerService::listAll(),
            'description' => CRUDBooster::getSetting('support_partners_description'),
            'link' => CRUDBooster::getSetting('support_partners_join_link')
        ]);
    }

    public function getMerchandise()
    {
        menuTag('donation');
        return view('page.frontend.donation.merchandise', [
            'is_mobile' => isMobile(),
            'data' => DB::table('donation_merchandise')
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    public function postListMerchandise()
    {
        try {
            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = DonationMerchandiseService::listScroll();
        } catch (Throwable $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
        }

        return response()->json($res);
    }
}
