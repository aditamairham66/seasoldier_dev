<?php
namespace App\Repositories;

use App\Models\DonationPartnerModel;
use Illuminate\Support\Facades\DB;

class DonationPartner extends DonationPartnerModel
{
    public static function firstById($id)
    {
        $find = DB::table('donation_partner')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    public static function listAll()
    {
        return DB::table('donation_partner')
            ->select(
                'donation_partner.id',
                'donation_partner.name',
                'donation_partner.image'
            )
            ->orderBy('donation_partner.sort', 'asc')
            ->get();
    }

}
