<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class TournamentController extends Controller
{

    public function index()
{
    $tournaments = [];
    $teams = [];  // Initialize the teams array
    $error = null;

    try {
        $response = Http::withOptions([
            'verify' => false
        ])->get('https://localhost:7005/tourneys');

        if ($response->successful()) {
            $tournaments = $response->json();

            // Process tournaments
            foreach ($tournaments as &$tournament) {
                if (!empty($tournament['matches'])) {
                    usort($tournament['matches'], function ($a, $b) {
                        return strtotime($a['startTime']) - strtotime($b['startTime']);
                    });

                    $nextMatch = null;
                    foreach ($tournament['matches'] as $match) {
                        if (strtotime($match['startTime']) > time()) {
                            $nextMatch = $match;
                            break;
                        }
                    }

                    $tournament['nextMatch'] = $nextMatch;
                }
            }
        } else {
            $error = 'Failed to retrieve tournaments. Please try again later.';
        }

        // Fetch teams from the database or an API (adjust this as needed)
        $teams = \App\Models\Team::all();  // Example: Replace with your own logic

    } catch (Exception $e) {
        $error = "Error fetching tournaments: " . $e->getMessage();
    }

    return view('pages.index', compact('tournaments', 'teams', 'error'));
}

}