@extends('users.index')

@section('content')

    <div class="containter">
        @foreach($trending_defs as $definition)
            @if(($definition->likes->pluck('up')->sum()) >= 2 && ($definition->likes->pluck('up')->sum()) < 5 )
            <div class="col-lg-10 definicije">
                <div class="col-md-12">
                    <h2><a href="{{route('definition.single',$definition->id)}}">{{$definition->title}}</a></h2>
                    <p class="likes_counter">{{($like->where('likeable_id',$definition->id)->pluck('up')->sum())- $like->where('likeable_id',$definition->id)->pluck('down')->sum()}}</p>

                    @if(!$definition->likes()->where('user_id',$logged_user_id)->count())
                        <div class="col-lg-12" style="margin-right: 50px">
                            <form action="{{route('definition.like.up')}}" style="text-align: right" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$definition->id}}">
                                <button>UP</button>
                            </form>
                            <form action="{{route('definition.like.down')}}" style="text-align: right" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$definition->id}}">
                                <button>DOWN</button>
                            </form>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <h5>{{$definition->body}}</h5>
                    <blockquote>{{$definition->example}}</blockquote>


                    <p style="text-align: right;"><i>{{$users->find($definition->user_id)->name}}</i>  |  {{$definition->created_at->diffForHumans()}}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection