<?php namespace App\Http\Controllers\Frontend;

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
        return view('page.frontend.profile.profile');
    }

    public function getIntroduction(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.introduction', [
            'data' => CmsSettingsService::getProfileIntroductionByKey()
        ]);
    }

    public function getOurOrganization(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.organization', [
            'data' => CmsSettingsService::getProfileOrganizationByKey(),
            'image' => ProfileOrganizationBanner::getDataBySortAsc()
        ]);
    }

    public function getBracelet(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.bracelet', [
            'data' => CmsSettingsService::getProfileBraceletByKey()
        ]);
    }

    public function getOurTeam(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.team', [
            'highlight' => ProfileTeamService::listByHighLight('Yes'),
            'team' => ProfileTeamService::listByHighLight('No')
        ]);
    }

    public function getSeasoldierKehormatan(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.honor', [
            'list' => ProfileHonorService::listSort()
        ]);
    }
}
