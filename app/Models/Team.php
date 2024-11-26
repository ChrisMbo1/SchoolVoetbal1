<?php

namespace App\Models;
use App\Models\Matches;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public function players()
{
    return $this->hasMany(User::class, 'team_id');
}

public function matches()
{
    return $this->hasMany(Matches::class, 'team1_id')->orWhere('team2_id', $this->id);
}

}
