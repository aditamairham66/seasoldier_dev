<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\DonationPartner;

class DonationPartnerService extends DonationPartner
{
    public static function listAll()
    {
        $data = parent::listAll();
        foreach ($data as $x => $row)
        {
            $row->image = (!empty($row->image) ? asset($row->image): '');
        }
        return $data;
    }

}
