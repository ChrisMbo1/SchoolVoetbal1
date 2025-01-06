<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Betting System</title>
</head>
<body>
    @if (Cookie::get('token'))
        @php
            $matchId = 1; // Example match ID
        @endphp

        <div class="alert alert-success">
            Token: {{ Cookie::get('token') }}
        </div>

        <!-- Betting Form -->
        <form action="{{ route('bet.place') }}" method="POST">
            @csrf
            <input type="hidden" name="match_id" value="{{ $matchId }}">
            <label for="bet_amount">Enter your bet amount:</label>
            <input type="number" id="bet_amount" name="bet_amount" min="1" required>
            <button type="submit">Place Bet</button>
        </form>
    @else
        <x-nav-link :href="route('login2')" :active="request()->routeIs('teams')">
            {{ __('login') }}
        </x-nav-link>
    @endif
</body>
</html>
