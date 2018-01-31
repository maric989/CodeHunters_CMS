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
    {{--{{Form::open(['route' => 'poster.store', 'files' => true])}}--}}
        {{--{{Form::label('title', 'Ime postera',['class' => 'control-label'])}}--}}
        {{--{{Form::text('title')}}--}}
            {{--<br>--}}
        {{--{{Form::label('body', 'Opisi poster',['class' => 'control-label'])}}--}}
        {{--{{Form::text('body')}}--}}
        {{--<br>--}}
        {{--{{Form::label('image', '.',['class' => 'control-label'])}}--}}
        {{--{{Form::file('image')}}--}}
    {{--<br>--}}
        {{--{{Form::submit('Kreiraj poster', ['class' => 'btn btn-success'])}}--}}

    {{--{{Form::close()}}--}}
    <form action="{{route('poster.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="title">Ime postera</label>
        <input type="text" id="imeInput" name="title" onchange="uzmiIme()">

        <label for="body">Opis postera</label>
        <input type="text" name="body" id="opisInput" onchange="uzmiOpis()">

        <br>
        <label for="body">Dodaj poster</label>
        <input type="file" name="image" onchange="loadFile(event)">

        <button>Submit</button>
    </form>

    <h3 class="titlePosta" id="imeP"></h3>
    <div class="poster_single">
        <img id="output"/>
        <div class="opisPosta">
            <h5 id="opisP"></h5>
        </div>
    </div>



    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        function uzmiIme() {
            var ime = document.getElementById('imeInput').value;
            document.getElementById('imeP').innerHTML = ime;
        }
        function uzmiOpis() {
            var opis = document.getElementById('opisInput').value;
            document.getElementById('opisP').innerHTML = opis;
        }

    </script>

</div>



@endsection