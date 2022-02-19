<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminContactUsController extends CBController
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
        $this->button_export = false;
        $this->table = "contact_us";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Email", "name" => "email"];
        $this->col[] = ["label" => "Message", "name" => "message"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'validation' => 'required|min:1|max:255|email', 'width' => 'col-sm-10', 'placeholder' => 'Please enter a valid email address'];
        $this->form[] = ['label' => 'Message', 'name' => 'message', 'type' => 'textarea', 'validation' => 'required|string|min:5|max:5000', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE
    }
}
