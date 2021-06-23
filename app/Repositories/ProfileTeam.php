<?php
namespace App\Repositories;

use App\Models\ProfileTeamModel;
use Illuminate\Support\Facades\DB;

class ProfileTeam extends ProfileTeamModel
{
    public static function firstById($id)
    {
        $find = DB::table('profile_team')
            ->where('profile_team.id', $id)
            ->first();

        return new static($find);
    }

}
