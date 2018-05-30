@extends('users.index')

@section('content')
    <div class="profilehead">
        <div><h3>{{$user->name}}</h3></div>
        @if(Auth::user())
            @if(Auth::user()->slug == $user->slug)
                <a href="{{route('author.settings',$user->slug)}}"><span>Edit profile</span></a>

            <div class="change_picture">
                <a href="{{route('author.uploadImage',$user->slug)}}"><span>Promeni Profilnu Sliku</span></a>
            </div>
            @endif
        @endif
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
                <li>Ukupno postera
                    <span style="float: right;margin-right: 30px">
                        <a href="{{route('author.posters',$user->slug)}}" style="color: white"> {{count($user->posters)}} </a>
                    </span>
                </li>
                <li>Ukupno definicija
                    <span style="float: right;margin-right: 30px">
                        {{count($user->definition)}}
                    </span>
                </li>
                <li>Ukupno Lajkovao
                    <span style="float: right;margin-right: 30px">
                        {{$user->getAllLikes()}}
                    </span>
                </li>
                <li>Ukupno Lajkovao Postere
                    <span style="float: right;margin-right: 30px">
                        {{$user->getAllPosterLikes()}}
                    </span>
                </li>
                <li>Ukupno Lajkovao Definicija
                    <span style="float: right;margin-right: 30px">
                        {{$user->getAllDefinitionLikes()}}
                    </span>
                </li>
                <li>Ukupno Lajkovan od drugih
                    <span style="float: right;margin-right: 30px">
                        {{$user->getDefinitionLiked() + $user->getPosterLiked()}}
                    </span>
                </li>
                <li>Ukupno Lajkovanih Definicija od drugih
                    <span style="float: right;margin-right: 30px">
                        {{$user->getDefinitionLiked()}}
                    </span>
                </li>
                <li>Ukupno Lajkovanih Postera od drugih
                    <span style="float: right;margin-right: 30px">
                        {{$user->getPosterLiked()}}
                    </span>
                </li>
                <li>Prisutan od
                    <span style="float: right;margin-right: 30px">
                        {{$user->created_at->format('d/m/Y')}}
                    </span>
                </li>
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