@extends('layouts.app')

<style>
    /* Table container */
    .table-container {
        margin: 30px auto;
        max-width: 1200px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #2c3e50;
        color: #fff;
        font-weight: bold;
    }

    td {
        color: #34495e;
    }

    /* Highlight for status */
    .status-ongoing {
        color: #e74c3c;
        font-weight: bold;
    }

    .status-finished {
        color: #2ecc71;
        font-weight: bold;
    }

    /* Action button */
    .btn-view {
        display: inline-block;
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: background-color 0.2s;
    }

    .btn-view:hover {
        background-color: #0056b3;
    }

    /* Table header for tournaments */
    .tournament-header {
        font-size: 24px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 10px;
    }
</style>

@section('content')
    <h1 class="text-center mb-5" style="font-size: 36px; font-weight: bold; color: #333;">All Available Matches</h1>

    <div class="table-container">
        @foreach($tournaments as $tournament)
            <div class="tournament-header">Tournament: {{ $tournament['name'] ?? 'N/A' }}</div>
            <table>
                <thead>
                    <tr>
                        <th>Match</th>
                        <th>Start Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tournament['matches'] ?? [] as $match)
                    <tr>
                        <td>
                            {{ $match['team1']['name'] ?? 'Unknown' }}
                            vs
                            {{ $match['team2']['name'] ?? 'Unknown' }}
                        </td>

                        <td>
                            {{ isset($match['startTime']) ? \Carbon\Carbon::parse($match['startTime'])->format('M d, Y h:i A') : 'TBD' }}
                        </td>


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
