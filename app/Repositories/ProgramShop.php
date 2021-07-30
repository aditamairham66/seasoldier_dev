<?php
namespace App\Repositories;

use App\Models\ProgramShopModel;
use Illuminate\Support\Facades\DB;

class ProgramShop extends ProgramShopModel
{
    public static function firstById($id)
    {
        return new static(DB::table('program_shop')
            ->where('program_shop.id', $id)
            ->first());
    }
}
