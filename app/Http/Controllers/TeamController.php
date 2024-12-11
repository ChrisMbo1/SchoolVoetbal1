<?php

namespace App\Http\Controllers;
use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

public function show($id)
{
    // Fetch the team by ID
    $team = Team::findOrFail($id);

    // Fetch all matches involving the team
    $matches = Matches::where('team1_id', $id)
        ->orWhere('team2_id', $id)
        ->with(['team1', 'team2', 'referee'])
        ->get();

    return view('team.details', compact('team', 'matches'));
}

}
