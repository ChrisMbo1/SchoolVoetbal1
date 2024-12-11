<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Send the GET request to your C# API endpoint
        $response = Http::get('https://localhost:7005/users/login');  // Replace with your actual C# API URL

        if ($response->successful()) {
            $users = $response->json();
        } else {
            // Handle error (show an empty array or error message)
            $users = [];
        }
        return view('pages.test', compact('users'));
    }
}
