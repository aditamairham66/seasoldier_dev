<?php namespace App\Http\Controllers;

use App\Repositories\DonationFundraising;
use crocodicstudio\crudbooster\controllers\CBController;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;

class AdminDonationFundraisingController extends CBController
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
        $this->table = "donation_fundraising";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Image", "name" => "image", "image" => true];
        $this->col[] = ["label" => "Name", "name" => "name"];
        $this->col[] = ["label" => "Link", "name" => "link", "callback" => function ($row) {
            return "<a href='$row->link' target='_blank' class='btn btn-xs btn-primary'>Open Link</a>";
        }];
        $this->col[] = ["label" => "Description", "name" => "desc"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'validation' => 'required|string|min:3', 'width' => 'col-sm-10', 'placeholder' => 'You can only enter the letter only'];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required|image|max:3000', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP'];
        $this->form[] = ['label' => 'Link', 'name' => 'link', 'type' => 'text', 'validation' => 'required|url', 'width' => 'col-sm-10', 'placeholder' => 'Example : https://google.com'];
        $this->form[] = ['label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'validation' => 'required|string|min:5|max:5000', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        $this->addaction = array();
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-up/[id]'), 'icon' => 'fa fa-arrow-up', 'color' => 'info'];
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-down/[id]'), 'icon' => 'fa fa-arrow-down', 'color' => 'info'];
    }

    public function hook_query_index(&$query)
    {
        $query->orderby('donation_fundraising.sort', 'asc');
    }

    public function hook_before_add(&$arr)
    {
        $latest_sorting = DB::table('donation_fundraising')->max('sort');
        $arr['sort'] = $latest_sorting + 1;
    }

    public function getMoveUp($id): bool
    {
        $find = DonationFundraising::firstById($id);

        if ($find->sort == 1) {
            CRUDBooster::redirect(CRUDBooster::adminPath('program-shop'), 'Banner Home adalah program shop dengan urutan teratas', 'danger');
        } else {
            $above = DonationFundraising::findBy('sort', $find->sort - 1);
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort - 1;
            $find->save();
            CRUDBooster::redirect(CRUDBooster::adminPath('program-shop'), 'Berhasil merubah urutan program shop', 'success');
        }

        return true;
    }

    public function getMoveDown($id): bool
    {
        $find = DonationFundraising::firstById($id);

        $above = DonationFundraising::findBy('sort', $find->sort + 1);
        if ($above->id == '') {
            CRUDBooster::redirect(CRUDBooster::adminPath('program-shop'), 'Banner Home adalah program shop dengan urutan terbawah', 'danger');
        } else {
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort + 1;
            $find->save();
            CRUDBooster::redirect(CRUDBooster::adminPath('program-shop'), 'Berhasil merubah urutan program shop', 'success');
        }

        return true;
    }
}
