<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;
use Illuminate\Support\Str;

class AdminRegionController extends CBController
{
    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "name";
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
        $this->table = "region";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Image", "name" => "image", "callback" => function ($row) {
            $pic = asset($row->image);
            $value = "<a data-lightbox='roadtrip'  rel='group_region' title='Regon: $row->name' href='" . $pic . "'>
            <img width='auto' height='40px' src='" . $pic . "'  style='background-color: #000000;padding:5px;border-radius: 5px;'/>
            </a>";

            return $value;
        }];
        $this->col[] = ["label" => "Name", "name" => "name"];
        $this->col[] = ["label" => "Instagram", "name" => "instagram", "callback" => function ($row) {
            return '<a href="' . $row->instagram . '" target="_blank">' . $row->instagram . '</a>';
        }];
        $this->col[] = ["label" => "Email", "name" => "email", "callback" => function ($row) {
            return '<a href="mailto:' . $row->email . '">' . $row->email . '</a>';
        }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required|image|max:3000', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP'];
        $this->form[] = ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'validation' => 'required|string|min:3|max:70', 'width' => 'col-sm-10', 'placeholder' => 'You can only enter the letter only'];
        $this->form[] = ['label' => 'Instagram', 'name' => 'instagram', 'type' => 'text', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'width' => 'col-sm-10', 'placeholder' => 'Please enter a valid email address'];
        # END FORM DO NOT REMOVE THIS LINE

        $this->style_css = '
            .lb-image{
                background-color:rgba(0,0,0,1);
            }
        ';

        $this->sub_module = [];
        $this->sub_module[] = ['label' => 'Instagram', 'path' => 'region-instagram', 'parent_columns' => 'name,instagram,email', 'foreign_key' => 'region_id', 'button_color' => 'info', 'button_icon' => 'fa fa-instagram'];
    }

    public function hook_before_add(&$arr)
    {
        $arr['slug'] = Str::slug($arr['name']);
    }
}
