<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use crocodicstudio\crudbooster\helpers\CB;

use Session;
use Request;
use DB;
use CRUDBooster;

class AdminBlogController extends \crocodicstudio\crudbooster\controllers\CBController
{

    public function cbInit()
    {

        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "title";
        $this->limit = "20";
        $this->orderby = "id,desc";
        $this->global_privilege = false;
        $this->button_table_action = true;
        $this->button_bulk_action = false;
        $this->button_action_style = "button_icon";
        $this->button_add = true;
        $this->button_edit = true;
        $this->button_delete = true;
        $this->button_detail = false;
        $this->button_show = false;
        $this->button_filter = false;
        $this->button_import = false;
        $this->button_export = false;
        $this->table = "blog";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Image", "name" => "image", "image" => true];
        $this->col[] = ["label" => "Title", "name" => "title"];
        $this->col[] = ["label" => "Content", "name" => "content", 'callback' => function ($row) {
            return Str::limit(strip_tags($row->content), 100, '...');
        }];
        $this->col[] = ["label" => "Publish", "name" => "publish"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required|image|max:3000', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP'];
        $this->form[] = ['label' => 'Title', 'name' => 'title', 'type' => 'text', 'validation' => 'required|string|min:3|max:70', 'width' => 'col-sm-10', 'placeholder' => 'You can only enter the letter only'];
        $this->form[] = ['label' => 'Content', 'name' => 'content', 'type' => 'wysiwyg', 'validation' => 'required|string|min:5|max:5000', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Publish', 'name' => 'publish', 'type' => 'select2', 'validation' => 'required', 'width' => 'col-sm-10', 'dataenum' => 'Publish;Draft'];
        # END FORM DO NOT REMOVE THIS LINE

        $this->sub_module = array();
        $this->sub_module[] = ['label' => 'Comment', 'path' => 'blog-comment', 'parent_columns' => 'title,content', 'foreign_key' => 'blog_id', 'button_color' => 'info', 'button_icon' => 'fa fa-sticky-note'];
    }

    public function hook_before_add(&$postdata)
    {
        //Your code here
        $postdata['slug'] = Str::slug(request('title'));
        Request::merge(['slug' => $postdata['slug']]);
        CB::valid([
            'slug' => 'required|unique:blog,slug',
        ], 'url');
    }

    public function hook_before_edit(&$postdata, $id)
    {
        //Your code here
        $postdata['slug'] = Str::slug(request('title'));
        Request::merge(['slug' => $postdata['slug']]);
        CB::valid([
            'slug' => 'required|unique:blog,slug,' . $id,
        ], 'url');
    }
}
