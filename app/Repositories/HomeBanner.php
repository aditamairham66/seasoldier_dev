<?php

namespace App\Repositories;

use App\Models\HomeBannerModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HomeBanner extends HomeBannerModel
{
    public static function firstById($id): HomeBanner
    {
        $find = DB::table('home_banner')
            ->where('home_banner.id', $id)
            ->first();

        return new static($find);
    }

    public static function getAll(): Collection
    {
        return self::table()
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
