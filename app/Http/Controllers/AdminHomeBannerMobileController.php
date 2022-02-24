<?php

namespace App\Http\Controllers;

use App\Repositories\HomeBanner;
use crocodicstudio\crudbooster\controllers\CBController;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class AdminHomeBannerMobileController extends CBController
{
    var $type = 'Mobile';

    public function cbInit()
    {
        $this->title_field = "title";
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
        $this->table = "home_banner";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Image", "name" => "image", "image" => true];
        $this->col[] = ["label" => "Type", "name" => "type"];
        $this->col[] = ["label" => "URL", "name" => "url", "callback" => function ($row) {
            return '<a href="' . $row->url . '" target="_blank">' . $row->url . '</a>';
        }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG'];
        $this->form[] = ['label' => 'URL', 'name' => 'url', 'type' => 'text', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        $this->addaction = [];
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-up/[id]'), 'icon' => 'fa fa-arrow-up', 'color' => 'info'];
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-down/[id]'), 'icon' => 'fa fa-arrow-down', 'color' => 'info'];
    }

    public function hook_query_index(&$query)
    {
        $query->where('type', '=', $this->type);
        $query->orderby('home_banner.sort', 'asc');
    }

    public function hook_before_add(&$arr)
    {
        $latest_sorting = HomeBanner::table()
            ->where('type', '=', $this->type)
            ->max('sort');

        $arr['type'] = $this->type;
        $arr['sort'] = $latest_sorting + 1;
    }

    public function getMoveUp($id): bool
    {
        $path = CRUDBooster::mainpath();
        $message = '';
        $type = 'warning';
        $find = HomeBanner::firstById($id);

        if ($find->sort == 1) {
            $message = 'Home Banner adalah home banner dengan urutan teratas';
            $type = 'danger';
        } elseif ($find->sort > 1) {
            $above = HomeBanner::findBySortAndType($find->sort - 1, $this->type);
            // $above = HomeBanner::findBy('sort', $find->sort - 1);
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort - 1;
            $find->save();

            $message = 'Berhasil merubah urutan home banner';
            $type = 'success';
        }

        CRUDBooster::redirect($path, $message, $type);
        return true;
    }

    public function getMoveDown($id): bool
    {
        $path = CRUDBooster::mainpath();
        $message = '';
        $type = 'warning';
        $find = HomeBanner::firstById($id);

        // $above = HomeBanner::findBy('sort', $find->sort + 1);
        $above = HomeBanner::findBySortAndType($find->sort + 1, $this->type);
        if ($above->id == '') {
            $message = 'Home Banner adalah home banner dengan urutan terbawah';
            $type = 'danger';
        } else {
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort + 1;
            $find->save();

            $message = 'Berhasil merubah urutan home banner';
            $type = 'success';
        }

        CRUDBooster::redirect($path, $message, $type);
        return true;
    }
}
