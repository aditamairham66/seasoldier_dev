<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\DonationFundraising;

class DonationFundraisingService extends DonationFundraising
{
    public static function listAll()
    {
        $data = parent::listAll();
        foreach ($data as $x => $row)
        {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->desc = (strip_tags(strlen($row->desc)) > 250 ? strip_tags(substr($row->desc,0,  250)).'...' : strip_tags($row->desc));
            $row->is_first = self::isFirst($x);
        }
        return $data;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function isFirst($key = 0)
    {
        if ($key > 0) {
            return false;
        } else {
            return true;
        }
    }

}
