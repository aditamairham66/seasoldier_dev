<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function getIndex()
    {
        menuTag('program');
        return view('page.frontend.program.program');
    }

    public function getShop()
    {
        menuTag('program');
        return view('page.frontend.program.shop');
    }

    public function getSoldier()
    {
        menuTag('program');
        return view('page.frontend.program.soldier');
    }

    public function getPlanting()
    {
        menuTag('program');
        return view('page.frontend.program.planting');
    }

    public function getMangrove()
    {
        menuTag('program');
        return view('page.frontend.program.mangrove');
    }
}
