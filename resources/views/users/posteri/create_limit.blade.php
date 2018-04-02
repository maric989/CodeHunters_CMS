@extends('users.index')

@section('content')

<div class="container">

    <h2>Probili ste limit za kreiranje postera</h2>

    <p>Sledeci poster mozete kreirati za: {{$last_poster->created_at->addHours(5)->diffForHumans()}}</p>
</div>



@endsection