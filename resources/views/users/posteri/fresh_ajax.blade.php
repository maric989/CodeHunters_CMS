@extends('users.index')

@section('content')
<meta name="csrf-token" content="{{csrf_token() }}">"}"
    <div id='containter' class="containter">
        @foreach($posters as $poster)
            @if(($poster->likes->pluck('up')->sum()) <=3 )
                    <div id="poster_single">
                        <h3><a href="{{route('poster.single',[$poster->slug,$poster->id])}}">{{$poster->title}}</a></h3>
                        <img src="{{$poster->image}}">
                        <div class="opisPosta">
                            <h4>{{$poster->body}}</h4>
                        </div>
                        <div id="parent" class="meta_info_poster">
                        <p class="post_meta">{{($like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('up')->sum()) - $like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('down')->sum()}} bodova | 0 komentara</p>
                         <p style="text-align: right">Kreator: AAA</p>

                        @if(Auth::user())
{{--                        @if(!$poster->likes()->where('user_id',$logged_user_id)->count())--}}
                                <div id="up" style="text-align: right" >
                                    {{csrf_field()}}
                                    <input type="hidden" name="post_id" id="post_id" value="{{$poster->id}}">
                                    <button id="btn_up">UP</button>
                                </div>
                                <div id="down" style="text-align: right" >
                                    {{csrf_field()}}
                                    <input type="hidden" name="post_id" value="{{$poster->id}}">
                                    <button class="btn_down" id="btn_down">DOWN</button>
                                </div>
                        {{--@else--}}
                            {{--@if($poster->likes()->where('user_id',$logged_user_id)->pluck('up'))--}}
                                    {{--<form action="{{route('poster.like.up')}}" style="text-align: right" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" name="post_id" value="{{$poster->id}}">--}}
                                        {{--<button id="btn_up">UP</button>--}}
                                    {{--</form>--}}
                                    {{--<form action="{{route('poster.like.down')}}" style="text-align: right" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" name="post_id" value="{{$poster->id}}">--}}
                                        {{--<button id="btn_down">DOWN</button>--}}
                                    {{--</form>--}}

                            {{--@elseif($poster->likes()->where('user_id',$logged_user_id)->pluck('down'))--}}

                                    {{--<form action="{{route('poster.like.up')}}" style="text-align: right" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" name="post_id" value="{{$poster->id}}">--}}
                                        {{--<button id="btn_up">UP</button>--}}
                                    {{--</form>--}}
                                        {{--<button id="btn_down" value="{{$poster->id}}>DOWN</button>--}}


                                {{--@endif--}}
                        {{--@endif--}}
                      @endif

                    </div>
                    </div>
            @endif
        @endforeach
    </div>
@endsection
