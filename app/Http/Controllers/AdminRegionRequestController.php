<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminRegionRequestController extends CBController
{
    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "id";
        $this->limit = "20";
        $this->orderby = "id,desc";
        $this->global_privilege = false;
        $this->button_table_action = true;
        $this->button_bulk_action = false;
        $this->button_action_style = "button_icon";
        $this->button_add = false;
        $this->button_edit = false;
        $this->button_delete = true;
        $this->button_detail = false;
        $this->button_show = false;
        $this->button_filter = false;
        $this->button_import = false;
        $this->button_export = true;
        $this->table = "region_request";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Datetime", "name" => "created_at"];
        $this->col[] = ["label" => "City", "name" => "city"];
        $this->col[] = ["label" => "Email", "name" => "email", "callback" => function ($row) {
            return '<a href="mailto:' . $row->email . '">' . $row->email . '</a>';
        }];
        $this->col[] = ["label" => "Phone", "name" => "phone", "callback" => function ($row) {
            return '<a href="tel:' . $row->phone . '">' . $row->phone . '</a>';
        }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        # END FORM DO NOT REMOVE THIS LINE
    }
}
