<?php
namespace App\Repositories;

use App\Models\ProgramSoldierModel;
use Illuminate\Support\Facades\DB;

class ProgramSoldier extends ProgramSoldierModel
{
    public static function firstById($id)
    {
        $find = DB::table('program_soldier')
            ->where('program_soldier.id', $id)
            ->first();

        return new static($find);
    }

}
