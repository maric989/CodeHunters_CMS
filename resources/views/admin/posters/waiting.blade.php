@extends('admin.index')


@section('content')

    @foreach($posters as $poster)

        <div  style="text-align: center">
            <p>{{$poster->title}}</p>
            <img src="{{$poster->image}}" width="300px" height="400px">
            <p> By {{$users->find($poster->user_id)->name}}</p>
            <div>
                <form action="{{route('admin.posteri.approve',$poster->id)}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success">Odobri</button>
                </form>
                <form action="{{route('admin.posteri.reject',$poster->id)}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-warning">Obrisi</button>
                </form>
            </div>
        </div>
        <hr>
    @endforeach
@endsection