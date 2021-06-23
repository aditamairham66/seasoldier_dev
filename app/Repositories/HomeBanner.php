<?php
namespace App\Repositories;

use App\Models\HomeBannerModel;
use Illuminate\Support\Facades\DB;

class HomeBanner extends HomeBannerModel
{
    public static function firstById($id)
    {
        $find = DB::table('home_banner')
            ->where('home_banner.id', $id)
            ->first();

        return new static($find);
    }

}
