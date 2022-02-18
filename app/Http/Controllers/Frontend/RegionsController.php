<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\General;
use App\Helpers\Router;
use App\Repositories\RegionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RegionsController extends Controller
{
    public function getIndex()
    {
        menuTag('region');
        return view('page.frontend.region.region', [
            'data' => DB::table('region')->get(),
        ]);
    }

    public function getDetail($slug)
    {
        $data = DB::table('region')
            ->where('slug', '=', $slug)
            ->first();
        if (!$data) {
            abort(404);
        }
        menuTag('region');
        return view('page.frontend.region.detail', [
            'slug' => $slug,
            'name' => $data->name,
            'code' => str_replace(['/', 'https:www.instagram.com'], "", $data->instagram),
            'instagram' => $data->instagram,
            'email' => $data->email,
            'image' => $data->image,
            'media' => DB::table('region_media')
                ->where('region_id', '=', $data->id)
                ->orderBy('id', 'ASC')
                ->get()
        ]);
    }

    public function getMedia($slug)
    {
        $data = DB::table('region_media')
            ->join('region', 'region.id', '=', 'region_media.region_id')
            ->select('region_media.instagram_url as url', 'region_media.instagram_image as image')
            ->where('region.slug', '=', $slug)
            ->orderBy('region_media.id', 'DESC')
            ->paginate(4);
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

    public function getRegister()
    {
        menuTag('region');
        return view('page.frontend.region.add');
    }

    public function postCitySave(Request $request)
    {
        $valid = Validator::make($request::all(), [
            'city' => 'required|string|min:1|max:255',
            'email' => 'required|email|min:1|max:255',
            'phone' => 'required|numeric',
        ]);

        if ($valid->fails()) {
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
        } else {
            $city = request('city');
            $email = request('email');
            $phone = request('phone');
            $date = date('Y-m-d', strtotime(General::dateNow()));

            $save = new RegionRequest();
            $save->date_request = $date;
            $save->city = $city;
            $save->email = $email;
            $save->phone = $phone;
            $save->save();

            if (!empty($save->id)) {
                $msg = 'Your request will be forwarded to our team.';
                $type = 'info';
            } else {
                $msg = 'Oops, something went wrong';
                $type = 'danger';
            }

            return redirect()->back()->with(['msg' => $msg, 'msg_type' => $type])->withInput();
        }
    }
}
