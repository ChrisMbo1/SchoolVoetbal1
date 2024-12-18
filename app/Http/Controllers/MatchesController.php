<?php

// app/Http/Controllers/MatchesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MatchesController extends Controller
{
    public function index()
    {
        // Initialize Guzzle HTTP Client
        $client = new Client();

        // Fetch match data from the API

            $response = $client->get('https://localhost:7005/tourneys', [
                'verify' => false,  // Disable SSL verification for local development
            ]);
            $tournaments = json_decode($response->getBody()->getContents(), true);

            // Debug: Check the structure of the data
            // You can dump the data temporarily to inspect its structure
            // dd($tournaments);

            // Return the view with the tournament data
            //dd($tournaments);
            return view('pages.matches', compact('tournaments'));

    }
}
