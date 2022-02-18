<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminRegionInstagramController extends CBController
{
    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->table = "region_media";
        $this->title_field = "instagram_name";
        $this->limit = 20;
        $this->orderby = "id,desc";
        $this->show_numbering = FALSE;
        $this->global_privilege = FALSE;
        $this->button_table_action = TRUE;
        $this->button_action_style = "button_icon";
        $this->button_add = TRUE;
        $this->button_delete = TRUE;
        $this->button_edit = FALSE;
        $this->button_detail = FALSE;
        $this->button_show = FALSE;
        $this->button_filter = FALSE;
        $this->button_export = FALSE;
        $this->button_import = FALSE;
        $this->button_bulk_action = FALSE;
        $this->sidebar_mode = "normal"; //normal,mini,collapse,collapse-mini
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = array("label" => "Region", "name" => "region_id", "join" => "region,name");
        $this->col[] = ["label" => "Thumbnail", "name" => "instagram_image", "image" => true];
        $this->col[] = ["label" => "Name", "name" => "instagram_name", "callback" => function ($row) {
            $label = $row->instagram_name;
            return "<a href='https://www.instagram.com/$label/' target='_blank'>@$label</a>";
        }];
        $this->col[] = ["label" => "Instagram Post", "name" => "instagram_url", "callback" => function ($row) {
            return "<a href='$row->instagram_url' target='_blank' class='btn btn-xs btn-primary'>See Post</a>";
        }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ["label" => "Region Id", "name" => "region_id", "type" => "select", "required" => TRUE, "validation" => "required|integer|min:0", "datatable" => "region,name"];
        $this->form[] = ["label" => "Instagram Url", "name" => "instagram_url", "type" => "text", "required" => TRUE, "validation" => "required|min:1|max:255"];
        # END FORM DO NOT REMOVE THIS LINE
    }

    public function hook_before_add(&$arr)
    {
        $api = reqInstagram($arr['instagram_url']);

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
        $arr['instagram_name'] = $api['author_name'];
        $arr['instagram_image'] = $api['thumbnail_url'];
        $arr['instagram_content'] = $description;
    }
}
