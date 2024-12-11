@extends('layouts.app')

@section('content')
    <h1>Users</h1>

    @if($users->isEmpty())
        <p>No users found.</p>
    @else
        <ul>
            @foreach($users as $user)
                <li>{{ $user['name'] }} - {{ $user['email'] }}</li>
            @endforeach
        </ul>
    @endif
@endsection
