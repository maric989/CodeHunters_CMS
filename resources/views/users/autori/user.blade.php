@extends('users.index')

@section('content')

    <div class="profilehead">
        <div>{{$user->name}}</div>
        <span>Edit profile</span>
    </div>
    <div class="wrap flex">
        <div class="userstats">
            <div class="znacke flex">
                <div>
                    <h2>{{count($user->definition)}}</h2><br>
                    <span>definicije</span>
                </div>
                <div>
                    <h2>{{count($user->posters)}}</h2><br>
                    <span>posteri</span>
                </div>
                <div>
                    <h2>hc</h2><br>
                    <span>reakcije</span>
                </div>
            </div>
            <ul>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
                <li>stats</li>
            </ul>
        </div>
        <div class="imgwrap">
            <img src="/images/profile.png" alt="profilna slika">
        </div>
    </div>


@endsection