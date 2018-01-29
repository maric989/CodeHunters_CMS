@extends('users.index')

@section('content')

    <div class="containter">
            <div class="col-lg-10 panel panel-default" style="text-align: left; background-color: darkolivegreen; color: white">
                <div class="col-md-12">
                    <h2><a href="{{route('definition.single',$definition->id)}}">{{$definition->title}}</a></h2>
                </div>
                <div class="col-md-12">
                    <h5>{{$definition->body}}</h5>
                    <blockquote>{{$definition->example}}</blockquote>


                    <p style="text-align: right;"><i>{{$def_creator->name}}</i>  |  {{$definition->created_at->diffForHumans()}}</p>
                </div>
            </div>

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

                <form action="{{route('def.comment.create')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" value="{{$definition->id}}">
                    <h3>Dodaj komentar</h3>
                    <textarea name="komentar"></textarea>
                    <br>
                    <button class="btn btn-default" type="submit">Posalji</button>
                </form>
                    <br>
                </div>
            </div>
    </div>
@endsection