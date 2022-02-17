<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function getIndex()
    {
        menuTag('gallery');
        return view('page.frontend.gallery.gallery', [
            'image' => DB::table('gallery')->orderBy('id', 'DESC')->get()
        ]);
    }

    public function getLoad()
    {
        $data = DB::table('gallery')
            ->select('code', 'instagram_url as url', 'instagram_name as name', 'instagram_image as image', 'instagram_content as content')
            ->orderBy('id', 'DESC')
            ->paginate(9);
        foreach ($data as $row) {
            $row->content = nl2br($row->content);
            $row->image = asset($row->image);
        }

        return response()->json([
            'status' => 1,
            'message' => 'success',
            'data' => [
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'items' => $data->items()
            ]
        ]);
    }

    public function getDetail($code)
    {
        $data = DB::table('gallery')
            ->where('code', $code)
            ->first();
        if (!$data) {
            abort(404);
        }

        $pref = DB::table('gallery')
            ->where('id', '>', $data->id)
            ->orderBy('id', 'ASC')
            ->first();
        $next = DB::table('gallery')
            ->where('id', '<', $data->id)
            ->orderBy('id', 'DESC')
            ->first();

        menuTag('gallery');
        return view('page.frontend.gallery.detail', [
            'url' => $data->instagram_url,
            'name' => $data->instagram_name,
            'image' => $data->instagram_image,
            'content' => $data->instagram_content,
            'pref' => $pref->code,
            'next' => $next->code
        ]);
    }
}
