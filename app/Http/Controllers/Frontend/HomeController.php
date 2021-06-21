<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        menuTag('home');
        return view('page.frontend.home.home');
    }
}
