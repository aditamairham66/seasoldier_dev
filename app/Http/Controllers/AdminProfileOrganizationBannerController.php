<?php

namespace App\Http\Controllers;

use App\Repositories\ProfileOrganizationBanner;
use crocodicstudio\crudbooster\controllers\CBController;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;

class AdminProfileOrganizationBannerController extends CBController
{
    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->table = "profile_organization_banner";
        $this->title_field = "id";
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
        $this->col[] = array("label" => "Image", "name" => "image", "image" => true);
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ["label" => "Image", "name" => "image", "type" => "upload", "required" => TRUE, "validation" => "required", "help" => "File types support : JPG, JPEG, PNG, GIF, BMP"];
        # END FORM DO NOT REMOVE THIS LINE

        $this->addaction = array();
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-up/[id]'), 'icon' => 'fa fa-arrow-up', 'color' => 'info'];
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-down/[id]'), 'icon' => 'fa fa-arrow-down', 'color' => 'info'];
    }

    public function hook_query_index(&$query)
    {
        $query->orderby('profile_organization_banner.sort', 'asc');
    }

    public function hook_before_add(&$arr)
    {
        $latest_sorting = DB::table('profile_organization_banner')
            ->max('sort');
        $arr['sort'] = $latest_sorting + 1;
    }

    public function getMoveUp($id): bool
    {
        $find = ProfileOrganizationBanner::firstById($id);

        if ($find->sort == 1) {
            CRUDBooster::redirect(CRUDBooster::adminPath('profile-organization-banner'), 'Data sudah pada urutan pertama', 'danger');
        } elseif ($find->sort > 1) {
            $above = ProfileOrganizationBanner::findBy('sort', $find->sort - 1);
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort - 1;
            $find->save();
            CRUDBooster::redirect(CRUDBooster::adminPath('profile-organization-banner'), 'Urutan berhasil di ubah', 'success');
        }
        return true;
    }

    public function getMoveDown($id): bool
    {
        $find = ProfileOrganizationBanner::firstById($id);

        $above = ProfileOrganizationBanner::findBy('sort', $find->sort + 1);
        if ($above->id == '') {
            CRUDBooster::redirect(CRUDBooster::adminPath('profile-organization-banner'), 'Data sudah pada urutan terakhir', 'danger');
        } elseif ($above->id != '') {
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort + 1;
            $find->save();
            CRUDBooster::redirect(CRUDBooster::adminPath('profile-organization-banner'), 'Urutan berhasil di ubah', 'success');
        }
        return true;
    }
}
