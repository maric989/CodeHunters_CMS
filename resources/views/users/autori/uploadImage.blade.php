@extends('users.index')

@section('content')
    <h2> Izmena slike</h2>

    <form method="post" action="{{route('author.storeImage',Auth::user()->slug)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="image"> Dodaj sliku</label>
        <input type="file" name="image">
        <button type="submit" class="btb btn-primary">Izmeni</button>
    </form>
@endsection