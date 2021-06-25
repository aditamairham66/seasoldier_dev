<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\ProfileHonor;

class ProfileHonorService extends ProfileHonor
{
    public static function listSort()
    {
        $data = parent::listSort();
        foreach ($data as $x => $row)
        {
            $row->image = (!empty($row->image)?asset($row->image):'');
        }
        return $data;
    }

}
