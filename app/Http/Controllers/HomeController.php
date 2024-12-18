<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function login(Request $request)
    {
        $client = new Client(['verify' => false]);
        $response = $client->get('https://localhost:7005/users/login', [
            'query' => [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ],
        ]);

        $body = json_decode($response->getBody(), true);

        if (isset($body['token'])) {
            $token = $body['token'];
            session(['token' => $token]);
            // Handle the successful login
            return redirect()->route('home')->withCookie(cookie('token', $token, 60)); // 60 minutes
        } else {
            // Handle the error
            return back()->withErrors(['message' => 'Login failed.']);
        }
    }

    public function register(Request $request)
    {
        $client = new Client(['verify' => false]);
        $response = $client->post('https://localhost:7005/users/register', [
            'query' => [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'password_confirmation' => $request->input('password_confirmation'),
            ],
        ]);

        $body = json_decode($response->getBody(), true);

        if (isset($body['token'])) {
            $token = $body['token'];
            // Store the token in a cookie
            return redirect()->route('home')->withCookie(cookie('token', $token, 60)); // 60 minutes
        } else {
            // Handle the error
            return back()->withErrors(['message' => 'Registration failed.']);
        }
    }
}
