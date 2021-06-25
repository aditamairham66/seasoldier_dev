<?php
namespace App\Repositories;

use App\Models\ProfileHonorModel;
use Illuminate\Support\Facades\DB;

class ProfileHonor extends ProfileHonorModel
{
    public static function firstById($id)
    {
        return new static(DB::table('profile_honor')
            ->where('profile_honor.id', $id)
            ->first());
    }

    public static function listSort()
    {
        return DB::table('profile_honor')
            ->select(
                'profile_honor.id',
                'profile_honor.name',
                'profile_honor.position',
                'profile_honor.image'
            )
            ->orderBy('profile_honor.sort', 'asc')
            ->get();
    }

}
