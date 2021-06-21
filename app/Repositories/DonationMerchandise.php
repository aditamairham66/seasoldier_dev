<?php
namespace App\Repositories;

use App\Models\DonationMerchandiseModel;
use Illuminate\Support\Facades\DB;

class DonationMerchandise extends DonationMerchandiseModel
{
    public static function listScroll()
    {
        return DB::table('donation_merchandise')
            ->select(
                'donation_merchandise.id',
                'donation_merchandise.name',
                'donation_merchandise.price',
                'donation_merchandise.link',
                'donation_merchandise.image'
            )
            ->orderby('donation_merchandise.id', 'asc')
            ->simplePaginate(9);;
    }

}
