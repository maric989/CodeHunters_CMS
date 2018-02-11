@extends('users.index')

@section('content')
    <div class="profilehead">
        <div>{{$user->name}}</div>
        <a href="{{route('author.settings',$user->slug)}}"><span>Edit profile</span></a>
    </div>
    <div class="change_picture">
        <a href="{{route('author.uploadImage',$user->slug)}}"><span>Promeni Profilnu Sliku</span></a>
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

                @if($user->profile_photo)
                        <img src="{{$user->profile_photo}}" alt="profilna slika">

                    </a>
                @else
                        <img src="/images/user/default-profile.png" alt="profilna slika">
                @endif

        </div>
    </div>


@endsection