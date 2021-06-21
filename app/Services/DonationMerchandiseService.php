<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\DonationMerchandise;

class DonationMerchandiseService extends DonationMerchandise
{
    public static function listScroll()
    {
        $data = parent::listScroll();
        foreach ($data as $x => $row) {
            $row->price = (!empty($row->price)?number_format($row->price, 0, ',', '.'):0);
            $row->image = (!empty($row->image)?asset($row->image):'');
        }
        return $data;
    }

}