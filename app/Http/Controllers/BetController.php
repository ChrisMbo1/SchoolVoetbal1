<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BetController extends Controller
{
    // Method to handle bet submission
    public function placeBet(Request $request)
    {

        // Validate the form input
        $request->validate([
            'bet_amount' => 'required|numeric|min:1', // Minimum bet is 1
            'match_id' => 'required|integer',       // Match ID must be provided
        ]);

        // For debugging, use dd() to show the data being submitted
        dd([
            'match_id' => $request->match_id,     // Match ID from the form
            'bet_amount' => $request->bet_amount // Betting amount
        ]);
    }
}
