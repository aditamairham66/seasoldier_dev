<?php

namespace App\Repositories;

use App\Models\ProfileOrganizationBannerModel;
use Illuminate\Support\Collection;

class ProfileOrganizationBanner extends ProfileOrganizationBannerModel
{
    public static function getDataBySortAsc(): Collection
    {
        return self::table()
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
