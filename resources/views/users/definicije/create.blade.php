@extends('users.index')

@section('content')

    <form action="{{route('definition.store')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Naslov</label>
            <input type="text" class="form-control" name="title" aria-describedby="titleHelp" placeholder="Unesite naslov">
            @if ($errors->has('title'))
                <span class="help-block">
                     <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('definicija') ? ' has-error' : '' }}">
            <label for="definicija">Definicija</label>
            <textarea class="form-control" placeholder="Upisite svoju definiciju ovde...." name="definicija"></textarea>
            @if ($errors->has('definicija'))
                <span class="help-block">
                     <strong>{{ $errors->first('definicija') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="primer">Primer <i>(nije obavezan)</i> </label>
            <textarea class="form-control" placeholder="Upisite svoj primer ovde...." name="primer"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Potvrdi</button>
    </form>

@endsection