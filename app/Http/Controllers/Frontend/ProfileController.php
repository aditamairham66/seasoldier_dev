<?php

namespace App\Http\Controllers\Frontend;

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

    public function getTeam(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.team');
    }

    public function getHonor(Request $request)
    {
        menuTag('profile');
        return view('page.frontend.profile.honor');
    }
}
