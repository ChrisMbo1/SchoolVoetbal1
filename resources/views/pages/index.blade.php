@extends('layouts.app')

@section('content')
<div class="container">
    <div class="background">
        <h2>Here comes the background image</h2>
    </div>

    <h1 style="width: 100%; text-align: center; margin-bottom: 20px; color:white;">Ongoing Tournaments</h1>



    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @else
        @foreach ($tournaments as $tournament)
            <div class="card">
                <div class="card-header">{{ $tournament['name'] }}</div>
                <div class="card-content">
                    @foreach ($tournament['matches'] as $match)
                        <h2>{{ $match['team1'] ?? 'Team 1' }} vs {{ $match['team2'] ?? 'Team 2' }}</h2>
                        <p>Start Time: {{ \Carbon\Carbon::parse($match['startTime'])->format('M d, Y h:i A') }}</p>
                        <p>Status: {{ $match['finished'] ? 'Finished' : 'not starter yet' }}</p>
                        @break
                    @endforeach
                </div>
                <div class="card-actions">
                    <button class="btn-primary">Details</button>
                </div>
            </div>
        @endforeach
    @endif
    
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
