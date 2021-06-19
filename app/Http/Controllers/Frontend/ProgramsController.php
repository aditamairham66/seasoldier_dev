<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function getIndex()
    {
        return view('page.frontend.program.program');
    }

    public function getShop()
    {
        return view('page.frontend.program.shop');
    }

    public function getSoldier()
    {
        return view('page.frontend.program.soldier');
    }

    public function getPlanting()
    {
        return view('page.frontend.program.planting');
    }

    public function getMangrove()
    {
        return view('page.frontend.program.mangrove');
    }
}
