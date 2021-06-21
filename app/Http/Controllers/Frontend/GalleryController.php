<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function getIndex()
    {
        menuTag('gallery');
        return view('page.frontend.gallery.gallery');
    }

    public function getDetail()
    {
        menuTag('gallery');
        return view('page.frontend.gallery.detail');
    }
}
