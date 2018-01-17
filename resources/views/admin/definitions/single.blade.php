@extends('admin.index')


@section('content')

    <div class="col-lg-10">
    <h2>{{$definition->title}}</h2>

    <p>{{$definition->body}}</p>

    @if($definition->example)
        <blockquote>
            {{$definition->example}}
        </blockquote>
    @endif


    @if($definition->approved == 0)
            <form method="post" action="{{route('admin.definition.approve',$definition->id)}}">
                {{csrf_field()}}
                <button class="btn btn-success">Approve</button>
            </form>
    @else
            <form method="post" action="{{route('admin.definition.disapproval',$definition->id)}}">
                {{csrf_field()}}
                <button class="btn btn-danger">Disapproval</button>
            </form>

    @endif
    </div>

@endsection