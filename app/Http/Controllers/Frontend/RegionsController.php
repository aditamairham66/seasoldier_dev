<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionsController extends Controller
{
    public function getIndex()
    {
        return view('page.frontend.region.region');
    }
}