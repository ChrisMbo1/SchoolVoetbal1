<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    public function fetchQuote()
    {

        $response = Http::get('https://programming-quotes-api.herokuapp.com/quotes/random');


        $quoteData = $response->json();


        return view('quote', [
            'quote' => $quoteData['en'], 
            'author' => $quoteData['author'] 
        ]);
    }
}
