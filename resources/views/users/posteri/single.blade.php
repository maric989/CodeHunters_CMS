@extends('users.index')

@section('content')

    <h2>{{$poster->title}}</h2>

    <img src="{{$poster->image}}" style="width: 70%; height: auto">

    <p>Autor: {{$creator->name}}</p>

    <div class="col-lg-10 panel panel-default">
        <h3>Komentari</h3>
        @foreach($comments as $comment)
            <div class="col-lg-7 panel panel-primary">
                <h5>{{$users->find($comment->user_id)->name}}</h5>
                <p>{{$comment->body}}</p>
                <p style="text-align: right">{{$comment->created_at->diffForHumans()}}</p>
            </div>
        @endforeach
        <div class="col-lg-10 panel panel-default">

            <form action="{{route('poster.comment.create')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="post_id" value="{{$poster->id}}">
                <h3>Dodaj komentar</h3>
                <textarea name="komentar"></textarea>
                <br>
                <button class="btn btn-default" type="submit">Posalji</button>
            </form>
            <br>
        </div>
    </div>
@endsection