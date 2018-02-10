@extends('users.index')

@section('content')
    <div class="profilehead">
        <div>{{$user->name}}</div>
        <a href="{{route('author.settings',$user->slug)}}"><span>Edit profile</span></a>
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

            @if(Auth::user()->slug == $user->slug)
                @if($user->img)
                    <a href="#" class="profile-pic">
                        <img src="/images/user/default-profile.png" alt="profilna slika">
                        <span><a href="#">Change Picture</a></span>
                    </a>
                @else
                    <a href="#" class="profile-pic">
                        <img src="/images/user/default-profile.png" alt="profilna slika">
                        <span><a href="#">Change Picture</a></span>
                    </a>
                @endif
            @else
                @if($user->img)
                        <img src="{{$user->img}}" alt="profilna slika">
                @else
                        <img src="/images/user/default-profile.png" alt="profilna slika">
                @endif
            @endif
        </div>
    </div>


@endsection