@extends('admin.index')


@section('content')


    @foreach($posters as $poster)

        <div  style="text-align: center">
            <p>{{$poster->title}}</p>
            <img src="{{$poster->image}}" width="300px" height="400px">
            <p> By {{$users->find($poster->user_id)->name}}</p>
            <div>
                @if($poster->approved)
                    <button class="btn btn-primary"> Approved</button>
                @else
                    <button class="btn btn-warning"> Waiting Approval</button>
                @endif
            </div>
        </div>
        <hr>
    @endforeach
    <div style="text-align: center">
    {{ $posters->links() }}
    </div>
@endsection