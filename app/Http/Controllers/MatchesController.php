<?php

// app/Http/Controllers/MatchesController.php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MatchesController extends Controller
{
    public function index()
    {
        // Initialize Guzzle HTTP Client
        $client = new Client();

        try {
            // Fetch tournament data from the API
            $response = $client->get('https://localhost:7005/tourneys', [
                'verify' => false,  // Disable SSL verification for local development
            ]);
            
            // Decode the JSON response into an array
            $tournaments = json_decode($response->getBody()->getContents(), true);

            // Return the view with the tournament data
            return view('pages.matches', compact('tournaments'));
        } catch (RequestException $e) {
            // Handle exceptions (e.g., network errors, API errors)
            return back()->withErrors(['error' => 'Failed to fetch tournament data.']);
        }
    }

    public function show($id)
    {
        // Initialize Guzzle HTTP Client
        $client = new Client();

        try {
            // Fetch match details based on ID from the API
            $response = $client->get('https://localhost:7005/tourneys/matches/' . $id, [
                'verify' => false,  // Disable SSL verification for local development
            ]);
            
            // Decode the JSON response into an array
            $match = json_decode($response->getBody()->getContents(), true);

            // Check if match data exists
            if (!$match) {
                return redirect()->route('matches.index')->withErrors(['error' => 'Match not found.']);
            }

            // Return the view with match details
            return view('pages.match_details', compact('match'));
        } catch (RequestException $e) {
            // Handle exceptions (e.g., network errors, API errors)
            return back()->withErrors(['error' => 'Failed to fetch match details.']);
        }
    }

    public function show($id)
    {
        $team = Team::findOrFail($id); // Retrieve the team by ID
        return view('pages.teamdetails', compact('team'));
    }
}