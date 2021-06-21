<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionsController extends Controller
{
    public function getIndex()
    {
        menuTag('region');
        return view('page.frontend.region.region');
    }

    public function getDetail()
    {
        menuTag('region');
        return view('page.frontend.region.detail');
    }
}
