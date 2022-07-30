<?php

namespace App\Http\Controllers;


use crocodicstudio\crudbooster\controllers\CBController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminProfilePreferenceController extends CBController
{
    var $list_image = ['Profile Bracelet Image', 'Profile Introduction Image', 'Profile Main Background'];

    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->table = "cms_settings";
        $this->title_field = "name";
        $this->limit = 20;
        $this->orderby = "id,asc";
        $this->show_numbering = FALSE;
        $this->global_privilege = FALSE;
        $this->button_table_action = TRUE;
        $this->button_action_style = "button_icon";
        $this->button_add = FALSE;
        $this->button_delete = FALSE;
        $this->button_edit = TRUE;
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
        $this->col[] = array("label" => "Name", "name" => "label");
        $this->col[] = array("label" => "Content", "name" => "content", "callback" => function ($row) {
            if (in_array($row->label, $this->list_image)) {
                return "<a data-lightbox='roadtrip'  rel='profile_preference' title='" . $row->name . "' href='" . asset($row->content) . "'>
                <img width='auto' height='40px' src='" . asset($row->content) . "'/></a>";
            } else {
                return nl2br($row->content);
            }
        });
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $id = request()->segment(4);
        $data = DB::table($this->table)
            ->where('id', $id)
            ->first();
        $this->form = [];
        $this->form[] = ["label" => "Name", "name" => "label", "type" => "text", "disabled" => TRUE];
        if (in_array($data->label, $this->list_image)) {
            $this->form[] = ["label" => "Content", "name" => "content", "type" => "upload", "required" => TRUE, "validation" => "required", "help" => "File types support : JPG, JPEG, PNG"];
        } else {
            $this->form[] = ['label' => 'Content', 'name' => 'content', 'type' => 'textarea'];
        }
        # END FORM DO NOT REMOVE THIS LINE
    }

    public function hook_query_index(&$query)
    {
        $query->whereIn('name', [
            'profile_introduction_description',
            'profile_introduction_image',
            'profile_organization_description',
            'profile_bracelet_description',
            'profile_bracelet_image',
            'profile_main_bg',
        ]);
    }

    public function hook_after_edit($id)
    {
        $query = DB::table('cms_settings')->where('id', $id)->first();
        Cache::forever('setting_' . $query->name, $query->content);
    }
}
