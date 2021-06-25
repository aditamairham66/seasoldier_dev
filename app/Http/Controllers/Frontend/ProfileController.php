<?php

namespace App\Http\Controllers\Frontend;

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
        return view('page.frontend.profile.introduction');
    }

    public function getOrganization(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.organization');
    }

    public function getBraclate(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.braclate');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTeam(Request $request)
    {
        menuTag('profile');
        $data = [];
        $data['highlight'] = ProfileTeamService::listByHighLight('Yes');
        $data['team'] = ProfileTeamService::listByHighLight('No');
        return view('page.frontend.profile.team', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHonor(Request $request)
    {
        menuTag('profile');
        $data = [];
        $data['list'] = ProfileHonorService::listSort();
        return view('page.frontend.profile.honor', $data);
    }
}
