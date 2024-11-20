
@extends('layouts.app')
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
</style>
<?php
$testData = [ ['name' => 'team1', 'info' => 'this team is bad', 'field' => '21'],['name' => 'team22', 'info' => 'this team is good', 'field' => '23'], ['name' => 'team21', 'info' => 'this team is shit', 'field' => '32'],   ['name' => 'team27', 'info' => 'this team is good', 'field' => '31'], ['name' => 'team25', 'info' => 'this team is good', 'field' => '23'],  ['name' => 'team22', 'info' => 'this team is good', 'field' => '43'],['name' => 'team1', 'info' => 'this team is bad', 'field' => '21'],  ['name' => 'team22', 'info' => 'this team is good', 'field' => '23'],  ['name' => 'team21', 'info' => 'this team is shit', 'field' => '32'],  ['name' => 'team27', 'info' => 'this team is good', 'field' => '31'],  ['name' => 'team25', 'info' => 'this team is good', 'field' => '23'],  ['name' => 'team22', 'info' => 'this team is good', 'field' => '43'],   ['name' => 'team1', 'info' => 'this team is bad', 'field' => '21'], ['name' => 'team22', 'info' => 'this team is good', 'field' => '23'],  ['name' => 'team21', 'info' => 'this team is shit', 'field' => '32'],  ['name' => 'team27', 'info' => 'this team is good', 'field' => '31'],  ['name' => 'team25', 'info' => 'this team is good', 'field' => '23'],  ['name' => 'team22', 'info' => 'this team is good', 'field' => '43'], ['name' => 'team1', 'info' => 'this team is bad', 'field' => '21'], ['name' => 'team22', 'info' => 'this team is good', 'field' => '23'], ['name' => 'team21', 'info' => 'this team is shit', 'field' => '32'],   ['name' => 'team27', 'info' => 'this team is good', 'field' => '31'], ['name' => 'team25', 'info' => 'this team is good', 'field' => '23'], ['name' => 'team22', 'info' => 'this team is good', 'field' => '43'],
]
?>

@section('content')
<h1 class="text-center mb-5" style="font-size: 36px; font-weight: bold; color: #333;">All Available Teams</h1>

<div class="container-teams">
        @foreach($testData as $data)
            <div class="teams">
                <div style="border: 1px solid #ddd; padding: 20px; background-color: #f7f7f7;">
                    <h3 style="margin: 0; font-size: 24px; font-weight: bold; color: #444;">{{ $data['name'] }}</h3>
                    <p style="margin: 10px 0; font-size: 14px; color: #666;">{{ $data['info'] }}</p>
                    <p style="margin: 10px 0; font-size: 16px; font-weight: bold; color: #27ae60;">Field: {{ $data['field'] }}</p>
                    <form action="{{}}" method="POST">
                            @csrf
                            <button style="padding: 3px; background-color: grey; border: none; color: white; cursor: pointer;" type="submit">Bekiijk team</button>
                        </form>
                </div>
            </div>
        @endforeach
</div>
@endsection
