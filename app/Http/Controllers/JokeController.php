<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class JokeController extends Controller
{
    public function fetchJoke()
    {
        // Make a GET request to the JokeAPI for a programming joke
        $response = Http::get('https://v2.jokeapi.dev/joke/Programming', [
            'lang' => 'en', // Optional, you can specify the language
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            $jokeData = $response->json();

            // Check if the joke is of type 'single' or 'twopart'
            if ($jokeData['type'] === 'single') {
                $joke = $jokeData['joke'];
            } else {
                // For two-part jokes, combine setup and delivery
                $joke = $jokeData['setup'] . ' - ' . $jokeData['delivery'];
            }

            // Return the joke to the view
            return view('joke', ['joke' => $joke]);
        } else {
            return view('joke', ['joke' => 'Sorry, we couldn\'t fetch a joke right now.']);
        }
    }
}
