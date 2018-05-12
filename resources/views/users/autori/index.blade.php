@extends('users.index')

@section('content')

<table class="table">
    <thead>
    <tr>
        <th>Ime</th>
        <th>Slug</th>
        <th>Clan od</th>
        <th>Broj Postera</th>
        <th>Broj Definicija</th>
    </tr>
    </thead>
    <tbody>

        @foreach($authors as $author)
            <tr>
                <td><a href="{{route('author.profile',[$author->slug])}}"> {{$author->name}} </a></td>
                <td>{{$author->slug}}</td>
                <td>{{$author->created_at->diffForHumans()}}</td>
                <td>{{$poster->where('user_id',$author->id)->count()}}</td>
                <td>{{$definitions->where('user_id',$author->id)->count()}}</td>
            </tr>
        @endforeach

    </tbody>
</table>

@endsection