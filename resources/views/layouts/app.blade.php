<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            
.container-teams{
    margin-top: 30px;
    display:flex;
    flex-wrap: wrap;
    gap: 30px;
    }

    .teams{
        height:200px;
        width: 200px;

    }

/* General page styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0; 
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    flex-wrap: wrap; 
    justify-content: center;
    align-items: flex-start;
    padding: 20px;
    gap: 20px;
}

.card {
    width: 300px;
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.card-header {
    height: 100px;
    background-color: #ececec;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    padding: 10px;
}

.card-content {
    padding: 16px;
}

.card-content h2 {
    font-size: 18px;
    margin-bottom: 10px;
    font-weight: 600;
}

.card-content p {
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.card-actions {
    display: flex;
    justify-content: space-between;
    padding: 10px 16px;
    background: #f9f9f9;
    border-top: 1px solid #ddd;
}

.card-actions button {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.btn-primary {
    background-color: #4CAF50;
    color: white;
}

.background {
    height: 300px;
    width: 1300px;
    background-color: paleturquoise;
    display: flex; 
    justify-content: center;
    align-items: center; 
    text-align: center; 
}

/* Form Styling */
.form-section {
    width: 1260px;
    background-color: #ffffff;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.form-section h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.form-group input:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

.form-section button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.form-section button:hover {
    background-color: #0056b3;
}
        </style>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
