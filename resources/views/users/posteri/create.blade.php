@extends('users.index')

@section('content')
    <h3>Napravi poster</h3>
<div class="container">
    {{--<form class="form-group" action="{{route('poster.store')}}" method="post">--}}
        {{--{{csrf_field()}}--}}
        {{--<label for="title"> Opisi poster</label>--}}
        {{--<input class="form-group" type="text" name="title">--}}
        {{--<input class="form-group" type="file" name="image">--}}
        {{--<button class="btn btn-primary" type="submit">Upload</button>--}}
    {{--</form>--}}
    {{Form::open(['route' => 'poster.store', 'files' => true])}}
        {{Form::label('title', 'Opisi poster',['class' => 'control-label'])}}
        {{Form::text('title')}}
            <br>
        {{Form::label('image', '.',['class' => 'control-label'])}}
        {{Form::file('image')}}
    <br>
        {{Form::submit('Kreiraj poster', ['class' => 'btn btn-success'])}}

    {{Form::close()}}
</div>

@endsection