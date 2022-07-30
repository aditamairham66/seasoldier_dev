<?php

namespace App\Http\Controllers;

use App\Repositories\ProfileTeam;
use crocodicstudio\crudbooster\controllers\CBController;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;

class AdminProfileTeamController extends CBController
{
    public function colorHighlight($value): string
    {
        switch ($value) {
            case 'Yes':
                $color = 'success';
                break;
            case 'No':
                $color = 'info';
                break;
            default:
                $color = 'default';
                break;
        }
        return $color;
    }

    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "name";
        $this->limit = "20";
        $this->orderby = "id,desc";
        $this->global_privilege = FALSE;
        $this->button_table_action = TRUE;
        $this->button_bulk_action = FALSE;
        $this->button_action_style = "button_icon";
        $this->button_add = TRUE;
        $this->button_edit = TRUE;
        $this->button_delete = TRUE;
        $this->button_detail = FALSE;
        $this->button_show = FALSE;
        $this->button_filter = FALSE;
        $this->button_import = FALSE;
        $this->button_export = FALSE;
        $this->table = "profile_team";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Image", "name" => "image", "image" => true];
        $this->col[] = ["label" => "Name", "name" => "name"];
        $this->col[] = ["label" => "Position", "name" => "position"];
        $this->col[] = ["label" => "Highlight", "name" => "highlight", "callback" => function ($row) {
            $color = self::colorHighlight($row->highlight);
            return "<span class='btn btn-xs btn-$color'>" . $row->highlight . "</span>";
        }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP'];
        $this->form[] = ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'validation' => 'required|string|min:3|max:70', 'width' => 'col-sm-10', 'placeholder' => 'You can only enter the letter only'];
        $this->form[] = ['label' => 'Position', 'name' => 'position', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Highlight', 'name' => 'highlight', 'type' => 'radio', 'validation' => 'required', 'width' => 'col-sm-10', 'dataenum' => 'Yes;No', 'value' => 'No'];
        # END FORM DO NOT REMOVE THIS LINE

        $this->addaction = array();
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-up/[id]'), 'icon' => 'fa fa-arrow-up', 'color' => 'info'];
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-down/[id]'), 'icon' => 'fa fa-arrow-down', 'color' => 'info'];
    }

    public function hook_query_index(&$query)
    {
        $query->orderby('profile_team.highlight', 'desc');
        $query->orderby('profile_team.sort', 'asc');
    }

    public function hook_before_add(&$arr)
    {
        $latest_sorting = DB::table('profile_team')->max('sort');
        $arr['sort'] = $latest_sorting + 1;
    }

    public function getMoveUp($id): bool
    {
        $find = ProfileTeam::firstById($id);

        if ($find->sort == 1) {
            CRUDBooster::redirect(CRUDBooster::adminPath('profile-team'), 'Profile Team adalah profile team dengan urutan teratas', 'danger');
        } elseif ($find->sort > 1) {
            $above = ProfileTeam::findBy('sort', $find->sort - 1);
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort - 1;
            $find->save();
        }
        CRUDBooster::redirect(CRUDBooster::adminPath('profile-team'), 'Berhasil merubah urutan profile team', 'success');

        return true;
    }

    public function getMoveDown($id): bool
    {
        $find = ProfileTeam::firstById($id);

        $above = ProfileTeam::findBy('sort', $find->sort + 1);
        if ($above->id == '') {
            CRUDBooster::redirect(CRUDBooster::adminPath('profile-team'), 'Profile Team adalah profile team dengan urutan terbawah', 'danger');
        } elseif ($above->id != '') {
            $above->sort = $find->sort;
            $above->save();

            $find->sort = $find->sort + 1;
            $find->save();
        }
        CRUDBooster::redirect(CRUDBooster::adminPath('profile-team'), 'Berhasil merubah urutan profile team', 'success');

        return true;
    }
}
