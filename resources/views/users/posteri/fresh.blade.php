@extends('users.index')

@section('content')

        @foreach($posters as $poster)
            @if(($poster->likes->pluck('up')->sum()) <=3 )
                    <div class="poster_single" >
                        <h3><a href="{{route('poster.single',[$poster->slug,$poster->id])}}">{{$poster->title}}</a></h3>
                        <h5>
                            <i class="fa fa-user"> {{$poster->user->name}}  </i>   |
                            <i class="fa fa-calendar"> pre {{$poster->createdAtSerbian()}}</i>
                        </h5>
                        <img src="{{$poster->image}}">
                        <div class="opisPosta">
                            <h4>{{$poster->body}}</h4>
                        </div>
                        <div class="meta_info_poster">
                        <p class="post_meta">{{($like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('up')->sum()) - $like->where('likeable_id',$poster->id)->whereIn('likeable_type','App\Poster')->pluck('down')->sum()}} bodova | 0 komentara</p>
                         <p style="text-align: right">Kreator: AAA</p>
                            <div id="social-links">
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li>
                                </ul>
                            </div>

                        @if(Auth::user())
{{--                        @if(!$poster->likes()->where('user_id',$logged_user_id)->count())--}}
                                <form  style="text-align: right" id="likes">
                                    {{--<input type="hidden" name="post_id" value="{{$poster->id}}">--}}
                                    {{--<button id="btn_up">UP</button>--}}
                                </form>
                                {{--<form action="{{route('poster.like.down')}}" style="text-align: right" method="post">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<input type="hidden" name="post_id" value="{{$poster->id}}">--}}
                                    {{--<button id="btn_down">DOWN</button>--}}
                                {{--</form>--}}
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
                        <hr>
                    </div>

            @endif
        @endforeach
        <div style="text-align: center">
            <?php echo $posters->render(); ?>
        </div>
@endsection
