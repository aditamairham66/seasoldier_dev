<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function getIndex()
    {
        return view('page.frontend.gallery.gallery');
    }

    public function getDetail()
    {
        return view('page.frontend.gallery.detail');
    }
}
