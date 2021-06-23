<?php
namespace App\Repositories;

use App\Models\ProgramTreeModel;
use Illuminate\Support\Facades\DB;

class ProgramTree extends ProgramTreeModel
{
    public static function firstById($id)
    {
        $find = DB::table('program_tree')
            ->where('program_tree.id', $id)
            ->first();

        return new static($find);
    }

}
