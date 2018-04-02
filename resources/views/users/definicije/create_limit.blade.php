@extends('users.index')

@section('content')

    <div class="container">

        <h2>Probili ste limit za kreiranje definicija</h2>

        <p>Sledecu definiciju mozete kreirati za: {{$last_definition->created_at->addHours(5)->diffForHumans()}}</p>
    </div>

@endsection