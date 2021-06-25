<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\ProfileTeam;

class ProfileTeamService extends ProfileTeam
{
    public static function listByHighLight($type)
    {
        $data = parent::listByHighLight($type);
        foreach ($data as $x => $row)
        {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            if ($type == 'Yes') {
                $row->isGanjil = self::isGanjil($x);
            }
        }
        return $data;
    }

    public static function isGanjil($value)
    {
        if ($value % 2 == 0) {
            return false;
        } else {
            return true;
        }
    }

}
