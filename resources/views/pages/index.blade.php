@extends('layouts.app')

@vite(['resources/css/main.css',])

@section('content')
<div class="container">
    <div class="background">
        <h2>Here comes the background image</h2>
    </div>

    <h1 style="width: 100%; text-align: center; margin-bottom: 20px;">Ongoing Tournaments</h1>

    
    <div class="card">
        <div class="card-header">Tournament 1</div>
        <div class="card-content">
            <h2>Exciting Battles Await!</h2>
            <p>Starts: Nov 25, 2024</p>
            <p>Ends: Dec 1, 2024</p>
        </div>
        <div class="card-actions">
            <button class="btn-primary">Details</button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Tournament 2</div>
        <div class="card-content">
            <h2>Pro Gamers Assemble!</h2>
            <p>Starts: Nov 26, 2024</p>
            <p>Ends: Dec 3, 2024</p>
        </div>
        <div class="card-actions">
            <button class="btn-primary">Details</button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Tournament 3</div>
        <div class="card-content">
            <h2>Casual Fun and Challenges</h2>
            <p>Starts: Nov 28, 2024</p>
            <p>Ends: Dec 5, 2024</p>
        </div>
        <div class="card-actions">
            <button class="btn-primary">Details</button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Tournament 4</div>
        <div class="card-content">
            <h2>Special Event Tournament</h2>
            <p>Starts: Nov 30, 2024</p>
            <p>Ends: Dec 7, 2024</p>
        </div>
        <div class="card-actions">
            <button class="btn-primary">Details</button>
        </div>
    </div>
    
    <div class="form-section">
        <h2>Test Form</h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Enter your message" rows="5" required></textarea>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
