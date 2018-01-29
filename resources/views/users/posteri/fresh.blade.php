@extends('users.index')

@section('content')

    <div class="containter">
        @foreach($posters as $poster)
            @if(($poster->likes->pluck('up')->sum()) <=3 )
                <div class="col-lg-10 panel panel-default" style="text-align: left; background-color: darkolivegreen; color: white">
                    <div class="col-md-12">
                        <h2><a href="{{route('poster.single',$poster->id)}}">{{$poster->title}}</a></h2>
                        <img src="{{$poster->image}}" style="width: 70%" height="auto">
                        <p style="text-align: right">{{($like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('up')->sum()) - $like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('down')->sum()}}</p>
                        @if(!$poster->likes()->where('user_id',$logged_user_id)->count())
                            <div class="col-lg-12" style="margin-right: 50px">
                                <form action="{{route('poster.like.up')}}" style="text-align: right" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="post_id" value="{{$poster->id}}">
                                    <button>UP</button>
                                </form>
                                <form action="{{route('poster.like.down')}}" style="text-align: right" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="post_id" value="{{$poster->id}}">
                                    <button>DOWN</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection