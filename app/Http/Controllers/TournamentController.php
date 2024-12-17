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
        $error = null;
    
        try {
            $response = Http::withOptions([
                'verify' => false
            ])->get('https://localhost:7005/tourneys');
    
            if ($response->successful()) {
                $tournaments = $response->json();
    
                // Filter en haal de eerstvolgende wedstrijd voor elk toernooi op
                foreach ($tournaments as &$tournament) {
                    if (isset($tournament['matches']) && count($tournament['matches']) > 0) {
                        // Sorteer de matches op startTime
                        usort($tournament['matches'], function ($a, $b) {
                            return strtotime($a['startTime']) - strtotime($b['startTime']);
                        });
    
                        // Selecteer alleen de eerstvolgende wedstrijd
                        $nextMatch = null;
                        foreach ($tournament['matches'] as $match) {
                            // Controleer of de starttijd in de toekomst ligt
                            if (strtotime($match['startTime']) > time()) {
                                $nextMatch = $match;
                                break;
                            }
                        }
    
                        // Voeg de eerstvolgende wedstrijd toe aan het toernooi
                        $tournament['nextMatch'] = $nextMatch;
                    }
                }
            } else {
                $error = 'Failed to retrieve tournaments. Please try again later.';
            }
        } catch (Exception $e) {
            $error = "Error fetching tournaments: " . $e->getMessage();
        }
    
        return view('pages.index', compact('tournaments', 'error'));
    }

}
