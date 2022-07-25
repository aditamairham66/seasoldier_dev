<?php

namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminGalleryController extends CBController
{
    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "instagram_name";
        $this->limit = "20";
        $this->orderby = "id,desc";
        $this->global_privilege = false;
        $this->button_table_action = true;
        $this->button_bulk_action = false;
        $this->button_action_style = "button_icon";
        $this->button_add = true;
        $this->button_edit = false;
        $this->button_delete = true;
        $this->button_detail = false;
        $this->button_show = false;
        $this->button_filter = false;
        $this->button_import = false;
        $this->button_export = false;
        $this->table = "gallery";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Instagram Post", "name" => "instagram_url", "callback" => function ($row) {
            return "<a href='$row->instagram_url' target='_blank' class='btn btn-xs btn-primary'>See Post</a>";
        }];
        $this->col[] = ["label" => "Thumbnail", "name" => "instagram_image", "image" => true];
        // $this->col[] = ["label" => "Name", "name" => "instagram_name", "callback" => function ($row) {
        //     $label = $row->instagram_name;
        //     return "<a href='https://www.instagram.com/$label/' target='_blank'>@$label</a>";
        // }];
        // $this->col[] = ["label" => "Content", "name" => "instagram_content", "callback" => function ($row) {
        //     return nl2br($row->instagram_content);
        // }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Instagram Url', 'name' => 'instagram_url', 'type' => 'text', 'validation' => 'required|url|max:255', 'width' => 'col-sm-10', 'help' => 'example : https://www.instagram.com/p/CQTrAhXAncP/'];
        # END FORM DO NOT REMOVE THIS LINE
    }

    public function hook_before_add(&$arr)
    {
        // $api = reqInstagram($arr['instagram_url']);
        $api = reqInstagram2($arr['instagram_url']);

        // setup description
        $title = explode(" ", $api['title']);
        $description = "";
        foreach ($title as $key => $value) {
            if (str_contains($value, "#")) {
                $label = substr($value, 1);
                $value = "<a href='https://www.instagram.com/explore/tags/" . $label . "/' target='_blank'>" . $value . "</a>";
            } elseif (str_contains($value, "@")) {
                $label = substr($value, 1);
                $value = "<a href='https://www.instagram.com/" . $label . "/' target='_blank'>" . $value . "</a>";
            }
            $description .= $value . " ";
        }

        $arr['code'] = str_replace(['https://www.instagram.com/p/', '/'], "", $arr['instagram_url']);
        // $arr['instagram_name'] = $api['author_name'];
        $arr['instagram_name'] = null;
        // $arr['instagram_image'] = $api['thumbnail_url'];
        $arr['instagram_image'] = $api;
        $arr['instagram_content'] = $description;
    }
}
