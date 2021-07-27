<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\ProfileOrganizationBanner;
use App\Services\CmsSettingsService;
use App\Services\ProfileHonorService;
use App\Services\ProfileTeamService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function getIndex()
    {
        menuTag('profile');
        return view('page.frontend.profile.profile');
    }

    public function getIntroduction(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.introduction', [
            'data' => CmsSettingsService::getProfileIntroductionByKey()
        ]);
    }

    public function getOrganization(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.organization', [
            'data' => CmsSettingsService::getProfileOrganizationByKey(),
            'image' => ProfileOrganizationBanner::getDataBySortAsc()
        ]);
    }

    public function getBraclate(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.braclate', [
            'data' => CmsSettingsService::getProfileBraclateByKey()
        ]);
    }

    public function getTeam(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.team', [
            'highlight' => ProfileTeamService::listByHighLight('Yes'),
            'team' => ProfileTeamService::listByHighLight('No')
        ]);
    }

    public function getHonor(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.honor', [
            'list' => ProfileHonorService::listSort()
        ]);
    }
}
