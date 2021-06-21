<?php
namespace App\Repositories;

use App\Models\DonationFundraisingModel;
use Illuminate\Support\Facades\DB;

class DonationFundraising extends DonationFundraisingModel
{
    public static function listScroll()
    {
        return DB::table('donation_fundraising')
            ->select(
                'donation_fundraising.id',
                'donation_fundraising.name',
                'donation_fundraising.image',
                'donation_fundraising.link',
                'donation_fundraising.desc'
            )
            ->orderby('donation_fundraising.id', 'asc')
            ->simplePaginate(5);
    }

}
