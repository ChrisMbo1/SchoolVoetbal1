@extends('layouts.app')

<style>
    /* Main container for tournaments */
    .container-teams {
        margin-top: 30px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Grid layout for responsiveness */
        gap: 30px;
        padding: 20px;
    }

    /* Tournament header */
    h2 {
        font-size: 28px;
        font-weight: bold;
        color: #2c3e50;
        margin-top: 20px;
        text-align: center;
        grid-column: span 2; /* Ensures the tournament title spans across the grid */
    }

    /* Match container */
    .match {
        background-color: #ecf0f1;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Match title (team names) */
    .match h3 {
        font-size: 22px;
        font-weight: bold;
        color: #34495e;
        margin-bottom: 10px;
    }

    /* Match details (start time, status, and field) */
    .match p {
        font-size: 16px;
        color: #7f8c8d;
        margin-bottom: 8px;
    }

    /* Highlight 'Ongoing' status */
    .match p.status-ongoing {
        color: #e74c3c;
        font-weight: bold;
    }

    /* Highlight 'Finished' status */
    .match p.status-finished {
        color: #2ecc71;
        font-weight: bold;
    }

    /* Style for date and time */
    .match p.start-time {
        font-style: italic;
        color: #95a5a6;
    }
</style>

@section('content')
    <h1 class="text-center mb-5" style="font-size: 36px; font-weight: bold; color: #333;">All Available Matches</h1>

    <div class="container-teams">
        @foreach($tournaments as $tournament)
            <h2>Tournament: {{ $tournament['name'] ?? 'N/A' }}</h2> <!-- Added fallback for 'name' -->
            @foreach($tournament['matches'] ?? [] as $match) <!-- Ensure matches exists before looping -->
                <div class="match">
                    @php
                    //dd($tournaments);
                    @endphp
                    <h1>{{ $match['team1']['name'] ?? 'Unknown' }} vs {{ $match['team2']['name'] ?? 'Unknown' }}</h1>


                    
                    <p class="start-time">
                        Start Time: 
                        {{ $match['startTime'] ? \Carbon\Carbon::parse($match['startTime'])->format('M d, Y h:i A') : 'TBD' }}
                    </p>
                    <h1>score 1: {{ $match['team1Score'] ?? 'Unknown' }} | score 2: {{ $match['team2Score'] ?? 'Unknown' }}</h1>
                    <p class="{{ $match['finished'] ? 'status-finished' : 'status-ongoing' }}">
                        Status: {{ $match['finished'] ? 'Finished' : 'not started yet' }}
                    </p>
                    <a href="{{ route('showMatches', ['id' => $match['id']]) }}" class="btn btn-primary">View Match</a>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection


