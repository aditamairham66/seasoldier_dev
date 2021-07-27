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
}
