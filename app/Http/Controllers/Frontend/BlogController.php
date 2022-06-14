<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\ContactUs;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BlogComment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class BlogController extends Controller
{
    public function getIndex()
    {
        menuTag('blog');
        $data = DB::table('blog')
            ->where('publish', 'Publish')
            ->orderBy('id', 'DESC')
            ->paginate(4);
        return view('page.frontend.blog.blog', [
            'is_mobile' => isMobile(),
            'data' => $data
        ]);
    }

    public function getDetail($slug)
    {
        try {
            $data = DB::table('blog')
                ->where('publish', 'Publish')
                ->where('slug', $slug)
                ->first();
            $comments = DB::table('blog_comment')
                            ->where('blog_id', $data->id)
                            ->get();
            return view('page.frontend.blog.detail', [
                'is_mobile' => isMobile(),
                'data' => $data,
                'comments' => $comments
            ]);
        } catch (\Throwable $th) {
            abort(404);
        }
        
    }

    public function postComment(Request $request)
    {
        $valid = Validator::make($request::all(), [
            'name' => 'required',
            'email' => 'required|email|min:1|max:255',
            'comment' => 'required|string|max:5000|min:5'
        ]);

        if ($valid->fails()) {
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
        } else {
            $name = request('name');
            $email = request('email');
            $comment = request('comment');

            $save = new BlogComment();
            $save->name = $name;
            $save->email = $email;
            $save->comment = $comment;
            $save->blog_id = request('blog_id');
            $save->save();

            if (!empty($save->id)) {
                CRUDBooster::sendNotification([
                    'content' => 'New Blog Comment',
                    'to' => CRUDBooster::adminPath('blog-comment'),
                    'id_cms_users' => [1, 2]
                ]);

                return redirect()->back();
            } else {
                $msg = 'Oops, something went wrong';
                $type = 'danger';
                return redirect()->back()->with(['msg' => $msg, 'msg_type' => $type])->withInput();
            }
        }
    }
}
