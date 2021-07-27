<?php

namespace App\Repositories;

use App\Models\ProfileOrganizationBannerModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProfileOrganizationBanner extends ProfileOrganizationBannerModel
{
    public static function firstById($id)
    {
        return new static(DB::table('profile_organization_banner')
            ->where('id', '=', $id)
            ->first());
    }

    public static function getDataBySortAsc(): Collection
    {
        return self::table()
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
