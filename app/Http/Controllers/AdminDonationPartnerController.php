<?php namespace App\Http\Controllers;

use App\Repositories\DonationPartner;
use crocodicstudio\crudbooster\controllers\CBController;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;

class AdminDonationPartnerController extends CBController
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
        $this->table = "donation_partner";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Name", "name" => "name"];
        $this->col[] = ["label" => "Image", "name" => "image", "image" => true];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'validation' => 'required|string|min:3|max:70', 'width' => 'col-sm-10', 'placeholder' => 'You can only enter the letter only'];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required|image|max:3000', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP'];
        # END FORM DO NOT REMOVE THIS LINE

        $this->addaction = array();
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-up/[id]'), 'icon' => 'fa fa-arrow-up', 'color' => 'info'];
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-down/[id]'), 'icon' => 'fa fa-arrow-down', 'color' => 'info'];
    }

    public function hook_query_index(&$query)
    {
        $query->orderby('donation_partner.sort', 'asc');
    }

    public function hook_before_add(&$arr)
    {
        $latest_sorting = DB::table('donation_partner')->max('sort');
        $arr['sort'] = $latest_sorting + 1;
    }

    public function getMoveUp($id): bool
    {
        $find = DonationPartner::firstById($id);

        if ($find->sort == 1) {
            CRUDBooster::redirect(CRUDBooster::adminPath('donation-partner'), 'Media Partners adalah Partner Donation dengan urutan teratas', 'danger');
        } elseif ($find->sort > 1) {
            $above = DonationPartner::findBy('sort', $find->sort - 1);
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort - 1;
            $find->save();
        }
        CRUDBooster::redirect(CRUDBooster::adminPath('donation-partner'), 'Berhasil merubah urutan Partner Donation', 'success');

        return true;
    }

    public function getMoveDown($id): bool
    {
        $find = DonationPartner::firstById($id);

        $above = DonationPartner::findBy('sort', $find->sort + 1);
        if ($above->id == '') {
            CRUDBooster::redirect(CRUDBooster::adminPath('donation-partner'), 'Media Partners adalah Partner Donation dengan urutan terbawah', 'danger');
        } elseif ($above->id != '') {
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort + 1;
            $find->save();
        }
        CRUDBooster::redirect(CRUDBooster::adminPath('donation-partner'), 'Berhasil merubah urutan Partner Donation', 'success');

        return true;
    }
}
