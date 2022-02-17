<?php

namespace App\Http\Controllers\Frontend;

use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProgramsController extends Controller
{
    public function getIndex()
    {
        menuTag('program');
        return view('page.frontend.program.program');
    }

    public function getShop()
    {
        menuTag('program');
        return view('page.frontend.program.shop', [
            'description' => CRUDBooster::getSetting('program_warungku_description'),
            'image' => DB::table('program_shop')->orderBy('sort', 'ASC')->get()
        ]);
    }

    public function getSoldier()
    {
        menuTag('program');
        return view('page.frontend.program.soldier', [
            'description' => CRUDBooster::getSetting('program_dolphin_description'),
            'image' => DB::table('program_soldier')->orderBy('sort', 'ASC')->get()
        ]);
    }

    public function getPlanting()
    {
        menuTag('program');
        return view('page.frontend.program.planting', [
            'description' => CRUDBooster::getSetting('program_trees_conservation_description'),
            'image' => DB::table('program_tree')->orderBy('sort', 'ASC')->get()
        ]);
    }

    public function getMangrove()
    {
        menuTag('program');
        return view('page.frontend.program.mangrove', [
            'description' => CRUDBooster::getSetting('program_mangrove_description'),
            'image' => DB::table('program_mangrove')->orderBy('sort', 'ASC')->get()
        ]);
    }
}
