<?php

namespace App\Repositories;

use App\Models\CmsSettingsModel;
use Illuminate\Support\Collection;

class CmsSettings extends CmsSettingsModel
{
    /**
     * @return string
     */
    public function setTable(): string
    {
        return 'cms_settings';
    }

    /**
     * @return Collection
     */
    public static function getFooter(): Collection
    {
        return self::table()
            ->where('group_setting', '=', 'Footer')
            ->get();
    }

    /**
     * @return Collection
     */
    public static function getProfileIntroduction(): Collection
    {
        return self::table()
            ->where('group_setting', '=', 'Profile Introduction')
            ->get();
    }

    /**
     * @return Collection
     */
    public static function getProfileBracelet(): Collection
    {
        return self::table()
            ->where('group_setting', '=', 'Profile Bracelet')
            ->get();
    }

    /**
     * @return Collection
     */
    public static function getProfileOrganization(): Collection
    {
        return self::table()
            ->where('group_setting', '=', 'Profile Organization')
            ->get();
    }
}
