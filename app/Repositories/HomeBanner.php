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

    public static function findBySortAndType($sort, $type)
    {
        $data = DB::table('home_banner')
            ->where('home_banner.sort', '=', $sort)
            ->where('home_banner.type', '=', $type)
            ->first();

        return new static($data);
    }

    public static function getAllMobile()
    {
        return self::table()
            ->where('type', '=', 'Mobile')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function getAllDesktop()
    {
        return self::table()
            ->where('type', '=', 'Desktop')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function getAll(): Collection
    {
        return self::table()
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
