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

    // TODO : Make your own query methods
    public static function getFooter(): Collection
    {
        return self::table()
            ->where('group_setting', '=', 'Footer')
            ->get();
    }
}
