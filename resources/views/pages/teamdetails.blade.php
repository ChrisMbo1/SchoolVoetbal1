@extends('layouts.app')

@section('content')
<h1 class="text-center mb-5">{{ $team->name }} Details</h1>

<div style="margin-bottom: 30px;">
    <p><strong>Info:</strong> {{ $team->info }}</p>
    <p><strong>Field:</strong> {{ $team->field }}</p>
</div>

<h2 class="text-center mb-4">Matches</h2>
<table class="table">
    <thead>
        <tr>
            <th>Match ID</th>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Score</th>
            <th>Field</th>
            <th>Referee</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($matches as $match)
        <tr>
            <td>{{ $match->id }}</td>
            <td>{{ $match->team1->name }}</td>
            <td>{{ $match->team2->name }}</td>
            <td>
                {{ $match->team1_score ?? 'N/A' }} - {{ $match->team2_score ?? 'N/A' }}
            </td>
            <td>{{ $match->field }}</td>
            <td>{{ $match->referee->name }}</td>
            <td>{{ $match->time }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
