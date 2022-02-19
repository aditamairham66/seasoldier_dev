<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminDonationMerchandiseController extends CBController
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
        $this->table = "donation_merchandise";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Image", "name" => "image", "image" => true];
        $this->col[] = ["label" => "Name", "name" => "name"];
        $this->col[] = ["label" => "Price", "name" => "price", "callback" => function ($row) {
            return number_format($row->price, 0, ',', '.');
        }];
        $this->col[] = ["label" => "Link", "name" => "link", "callback" => function ($row) {
            return "<a href='$row->link' target='_blank' class='btn btn-xs btn-primary'>Open Link</a>";
        }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'validation' => 'required|string|min:3|max:70', 'width' => 'col-sm-10', 'placeholder' => 'You can only enter the letter only'];
        $this->form[] = ['label' => 'Price', 'name' => 'price', 'type' => 'money', 'validation' => 'required', 'width' => 'col-sm-10', 'decimals' => '0'];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required|image|max:3000', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP'];
        $this->form[] = ['label' => 'Link', 'name' => 'link', 'type' => 'text', 'validation' => 'required|url', 'width' => 'col-sm-10', 'placeholder' => 'Example : https://google.com'];
        # END FORM DO NOT REMOVE THIS LINE
    }
}
