<?php

namespace App\Http\Controllers;
use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function show($id)
    {
       // Attempt to find the team by ID, or abort with a 404 if not found
       $team = Team::findOrFail($id); 

       // Fetch matches involving the team, paginate the results
       // We're checking if the team is in either 'team1' or 'team2'
       $matches = Matches::where('team1_id', $id)
           ->orWhere('team2_id', $id)
           ->with(['team1', 'team2', 'referee'])  // Eager load related teams and referee data
           ->paginate(10);  // Paginate the results, 10 matches per page

       // Return the team and matches to the 'team.details' view
       return view('team.details', compact('team', 'matches'));
    }

}
