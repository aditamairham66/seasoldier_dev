<?php namespace App\Http\Controllers;

use App\Repositories\ProgramShop;
use crocodicstudio\crudbooster\controllers\CBController;
use Illuminate\Support\Facades\DB;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class AdminProgramShopController extends CBController
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
        $this->button_edit = false;
        $this->button_delete = true;
        $this->button_detail = false;
        $this->button_show = false;
        $this->button_filter = false;
        $this->button_import = false;
        $this->button_export = false;
        $this->table = "program_shop";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label" => "Image", "name" => "image", "image" => true];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label' => 'Image', 'name' => 'image', 'type' => 'upload', 'validation' => 'required|image|max:3000', 'width' => 'col-sm-10', 'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP'];
        # END FORM DO NOT REMOVE THIS LINE

        $this->addaction = array();
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-up/[id]'), 'icon' => 'fa fa-arrow-up', 'color' => 'info'];
        $this->addaction[] = ['title' => '', 'url' => CRUDBooster::mainpath('move-down/[id]'), 'icon' => 'fa fa-arrow-down', 'color' => 'info'];
    }

    public function hook_query_index(&$query)
    {
        $query->orderby('program_shop.sort', 'asc');
    }

    public function hook_before_add(&$arr)
    {
        $latest_sorting = DB::table('program_shop')
            ->max('sort');
        $arr['sort'] = $latest_sorting + 1;
    }

    public function hook_before_delete($id)
    {
        $total = DB::table('program_shop')->count();
        if ($total <= 3) {
            CRUDBooster::redirectBack('Program Shop harus memiliki minimal 3 Gambar');
        }
    }

    public function getMoveUp($id): bool
    {
        $find = ProgramShop::firstById($id);

        if ($find->sort == 1) {
            CRUDBooster::redirect(CRUDBooster::adminPath('program-shop'), 'Banner Home adalah program shop dengan urutan teratas', 'danger');
        } else {
            $above = ProgramShop::findBy('sort', $find->sort - 1);
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
        $find = ProgramShop::firstById($id);

        $above = ProgramShop::findBy('sort', $find->sort + 1);
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
