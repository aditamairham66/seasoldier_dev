<?php
namespace App\Repositories;

use App\Models\ProgramMangroveModel;
use Illuminate\Support\Facades\DB;

class ProgramMangrove extends ProgramMangroveModel
{
    public static function firstById($id)
    {
        $find = DB::table('program_mangrove')
            ->where('program_mangrove.id', $id)
            ->first();

        return new static($find);
    }

}
