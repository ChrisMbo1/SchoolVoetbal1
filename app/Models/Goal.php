<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    public function player()
{
    return $this->belongsTo(User::class, 'player_id');
}

public function match()
{
    return $this->belongsTo(Matches::class, 'match_id');
}

}
