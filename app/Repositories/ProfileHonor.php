<?php
namespace App\Repositories;

use App\Models\ProfileHonorModel;
use Illuminate\Support\Facades\DB;

class ProfileHonor extends ProfileHonorModel
{
    public static function firstById($id)
    {
        $find = DB::table('profile_honor')
            ->where('profile_honor.id', $id)
            ->first();

        return new static($find);
    }

}
