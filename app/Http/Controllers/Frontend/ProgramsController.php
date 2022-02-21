<?php

namespace App\Http\Controllers\Frontend;

use crocodicstudio\crudbooster\helpers\CRUDBooster;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProgramsController extends Controller
{
    public function getIndex()
    {
        menuTag('program');
        return view('page.frontend.program.program', [
            'is_mobile' => isMobile(),
        ]);
    }

    public function getBersihkanWarungku()
    {
        menuTag('program');
        return view('page.frontend.program.warungku', [
            'is_mobile' => isMobile(),
            'description' => CRUDBooster::getSetting('program_warungku_description'),
            'image' => DB::table('program_shop')->orderBy('sort', 'ASC')->get()
        ]);
    }

    public function getDolphinSoldier()
    {
        menuTag('program');
        return view('page.frontend.program.soldier', [
            'is_mobile' => isMobile(),
            'description' => CRUDBooster::getSetting('program_dolphin_description'),
            'image' => DB::table('program_soldier')->orderBy('sort', 'ASC')->get()
        ]);
    }

    public function getTreesConservation()
    {
        menuTag('program');
        return view('page.frontend.program.planting', [
            'is_mobile' => isMobile(),
            'description' => CRUDBooster::getSetting('program_trees_conservation_description'),
            'image' => DB::table('program_tree')->orderBy('sort', 'ASC')->get()
        ]);
    }

    public function getMangroveConservation()
    {
        menuTag('program');
        return view('page.frontend.program.mangrove', [
            'is_mobile' => isMobile(),
            'description' => CRUDBooster::getSetting('program_mangrove_description'),
            'image' => DB::table('program_mangrove')->orderBy('sort', 'ASC')->get()
        ]);
    }
}
