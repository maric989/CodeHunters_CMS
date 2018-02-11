@extends('users.index')

@section('content')

{{--<table class="table">--}}
    {{--<thead>--}}
    {{--<tr>--}}
        {{--<th>Ime</th>--}}
        {{--<th>Clan od</th>--}}
        {{--<th>Broj Postera</th>--}}
        {{--<th>Broj Definicija</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
        {{--@foreach($authors as $author)--}}
            {{--<tr>--}}
                {{--<td>{{$author->name}}</td>--}}
                {{--<td>{{$author->created_at->diffForHumans()}}</td>--}}
                {{--<td>{{$poster->where('user_id',$author->id)->count()}}</td>--}}
                {{--<td>{{$definitions->where('user_id',$author->id)->count()}}</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}

    {{--</tbody>--}}
{{--</table>--}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@foreach($authors as $author)

<div class="card">
    <img src="/images/user/default-profile.png" alt="John" style="width:100%">
    <h1>{{$author->name}}</h1>
    <p class="title">CEO & Founder, Example</p>
    <p>Harvard University</p>
    <a href="#"><i class="fa fa-dribbble"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
    <p><button>Contact</button></p>
</div>

@endforeach
@endsection