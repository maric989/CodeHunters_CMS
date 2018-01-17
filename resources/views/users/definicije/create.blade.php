@extends('users.index')

@section('content')

    <form action="{{route('definition.store')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Naslov</label>
            <input type="text" class="form-control" name="title" aria-describedby="titleHelp" placeholder="Unesite naslov">
        </div>
        <div class="form-group">
            <label for="definicija">Definicija</label>
            <textarea class="form-control" placeholder="Upisite svoju definiciju ovde...." name="definicija"></textarea>
        </div>
        <div class="form-group">
            <label for="primer">Primer <i>(nije obavezan)</i> </label>
            <textarea class="form-control" placeholder="Upisite svoj primer ovde...." name="primer"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Potvrdi</button>
    </form>

@endsection