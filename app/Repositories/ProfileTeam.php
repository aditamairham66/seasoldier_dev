<?php
namespace App\Repositories;

use App\Models\ProfileTeamModel;
use Illuminate\Support\Facades\DB;

class ProfileTeam extends ProfileTeamModel
{
    public static function firstById($id)
    {
        return new static(DB::table('profile_team')
            ->where('profile_team.id', $id)
            ->first());
    }

    public static function listByHighLight($type)
    {
        return DB::table('profile_team')
            ->select(
                'profile_team.id',
                'profile_team.highlight',
                'profile_team.name',
                'profile_team.position',
                'profile_team.image'
            )
            ->where(function ($q) use ($type) {
                if ($type) {
                    $q->where('profile_team.highlight', $type);
                }
            })
            ->orderBy('profile_team.sort', 'asc')
            ->get();
    }

}
