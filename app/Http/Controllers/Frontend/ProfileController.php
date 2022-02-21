<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\ProfileOrganizationBanner;
use App\Services\CmsSettingsService;
use App\Services\ProfileHonorService;
use App\Services\ProfileTeamService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getIndex()
    {
        menuTag('profile');
        return view('page.frontend.profile.profile', [
            'is_mobile' => isMobile(),
        ]);
    }

    public function getIntroduction(Request $request)
    {
        $data = CmsSettingsService::getProfileIntroductionByKey();

        menuTag('profile');
        return view('page.frontend.profile.introduction', [
            'is_mobile' => isMobile(),
            'image' => $data['profile_introduction_image']->content ?? 'vendor/front/assets/example/img/favicon.png',
            'description' => $data['profile_introduction_description']->content ?? ''
        ]);
    }

    public function getOurOrganization(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.organization', [
            'is_mobile' => isMobile(),
            'description' => CmsSettingsService::getProfileOrganizationByKey()['profile_organization_description']->content,
            'image' => ProfileOrganizationBanner::getDataBySortAsc()
        ]);
    }

    public function getBracelet(Request $request)
    {
        $data = CmsSettingsService::getProfileBraceletByKey();

        menuTag('profile');
        return view('page.frontend.profile.bracelet', [
            'is_mobile' => isMobile(),
            'image' => $data['profile_bracelet_image']->content ?? 'vendor/front/assets/example/img/favicon.png',
            'description' => $data['profile_bracelet_description']->content ?? ''
        ]);
    }

    public function getOurTeam(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.team', [
            'is_mobile' => isMobile(),
            'highlight' => ProfileTeamService::listByHighLight('Yes'),
            'team' => ProfileTeamService::listByHighLight('No')
        ]);
    }

    public function getSeasoldierKehormatan(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.kehormatan', [
            'is_mobile' => isMobile(),
            'list' => ProfileHonorService::listSort()
        ]);
    }
}
