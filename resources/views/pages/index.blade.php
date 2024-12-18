@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px;">
    <div class="background" style="background-image: url('/path/to/your/image.jpg'); background-size: cover; background-position: center; height: 200px; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
        <h2 style="font-size: 36px; text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">Here comes the background image</h2>
    </div>

    <h1 style="width: 100%; text-align: center; margin-bottom: 20px; color:white;">Ongoing Tournaments</h1>

    @if (Cookie::get('token'))
        <div class="alert alert-success">
            Token: {{ Cookie::get('token') }}
        </div>
    @endif


    @if (isset($error))
        <div class="alert alert-danger" style="text-align: center; margin-bottom: 20px;">
            {{ $error }}
        </div>
    @else
        @foreach ($tournaments as $tournament)
            <div class="card" style="margin-bottom: 20px; border: 1px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background-color: #007bff; color: white; padding: 10px 15px; font-size: 20px; border-radius: 8px 8px 0 0;">
                    {{ $tournament['name'] }}
                </div>
                <div class="card-content" style="padding: 15px;">
                    @foreach ($tournament['matches'] as $match)
                        <h3 style="margin: 0; font-size: 18px; color: #343a40;">
                            {{ $match['team1']['name'] ?? 'Unknown' }} ({{ $match['team1Score'] ?? '-' }})
                            vs
                            {{ $match['team2']['name'] ?? 'Unknown' }} ({{ $match['team2Score'] ?? '-' }})
                        </h3>
                        <p style="color: #555; margin: 5px 0;">Start Time: {{ \Carbon\Carbon::parse($match['startTime'])->format('M d, Y h:i A') }}</p>
                        <p style="color: #555; margin: 5px 0;">Status: {{ $match['finished'] ? 'Finished' : 'Not started yet' }}</p>
                        @break
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif

    <div class="form-section">
        <h2>Test Form <b style="color:red;">not functional yet</b></h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
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

            <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                Save
            </button>
        </form>
    </div>
</div>
@endsection
