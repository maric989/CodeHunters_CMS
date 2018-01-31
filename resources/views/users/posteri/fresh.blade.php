@extends('users.index')

@section('content')

    <div class="containter">
        @foreach($posters as $poster)
            @if(($poster->likes->pluck('up')->sum()) <=3 )

                <article class="col-lg-10 poster">
                    <div class="col-md-12">
                        <h3><a href="{{route('poster.single',$poster->id)}}">{{$poster->title}}</a></h3>
                        <img src="{{$poster->image}}">
                        <p class="post_meta">{{($like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('up')->sum()) - $like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('down')->sum()}} bodova | 0 komentara</p>

                        @if(Auth::user())
                        @if(!$poster->likes()->where('user_id',$logged_user_id)->count())
                            <div class="col-lg-12 poster_action">
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
                        @else
                            @if($poster->likes()->where('user_id',$logged_user_id)->pluck('up'))
                                <div class="col-lg-12 poster_action">
                                    <form action="{{route('poster.like.up')}}" style="text-align: right" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{$poster->id}}">
                                        <button style="color: red">UP</button>
                                    </form>
                                    <form action="{{route('poster.like.down')}}" style="text-align: right" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{$poster->id}}">
                                        <button>DOWN</button>
                                    </form>
                                </div>

                            @elseif($poster->likes()->where('user_id',$logged_user_id)->pluck('down'))

                                <div class="col-lg-12 poster_action">
                                    <form action="{{route('poster.like.up')}}" style="text-align: right" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{$poster->id}}">
                                        <button>UP</button>
                                    </form>
                                    <form action="{{route('poster.like.down')}}" style="text-align: right" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{$poster->id}}">
                                        <button style="color: blue">DOWN</button>
                                    </form>
                                </div>
                                @endif
                        @endif
                      @endif
                    </div>
                </article>
            @endif
        @endforeach
    </div>
@endsection