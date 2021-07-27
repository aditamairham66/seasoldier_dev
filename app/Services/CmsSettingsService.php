<?php

namespace App\Services;

use App\Repositories\CmsSettings;
use Illuminate\Support\Facades\DB;

class CmsSettingsService extends CmsSettings
{
    /**
     * @return array
     */
    public static function getFooterByKey(): array
    {
        // make result for data
        $result = [];

        $data = self::getFooter();
        foreach ($data as $row) {
            $result[$row->name] = $row;
        }

        return $result;
    }

    /**
     * @return array
     */
    public static function getProfileIntroductionByKey(): array
    {
        // make result for data
        $result = [];

        $data = self::getProfileIntroduction();
        foreach ($data as $row) {
            $result[$row->name] = $row;
        }

        return $result;
    }

    /**
     * @return array
     */
    public static function getProfileOrganizationByKey(): array
    {
        // make result for data
        $result = [];

        $data = self::getProfileOrganization();
        foreach ($data as $row) {
            $result[$row->name] = $row;
        }

        return $result;
    }

    /**
     * @return array
     */
    public static function getProfileBraclateByKey(): array
    {
        // make result for data
        $result = [];

        $data = self::getProfileBraclate();
        foreach ($data as $row) {
            $result[$row->name] = $row;
        }

        return $result;
    }
}
