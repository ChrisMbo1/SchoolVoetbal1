<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    public function team1()
{
    return $this->belongsTo(Team::class, 'team1_id');
}

public function team2()
{
    return $this->belongsTo(Team::class, 'team2_id');
}

public function goals()
{
    return $this->hasMany(Goal::class, 'match_id');
}

}
