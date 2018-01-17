@extends('admin.index')


@section('content')

    <div class="containder">
        <h3 style="color: #ac2925">Welcome {{$user->name}}</h3>

        <div class="col-lg-12" style="text-align: center">
            <div class="col-lg-4">
                <h1>{{$users_count}}</h1>
                <p>Broj Usera</p>
            </div>
            <div class="col-lg-4">
                <h1>{{$definicije_count}}</h1>
                <p>Broj Definicija</p>
            </div>
            <div class="col-lg-4">
                <h1>0</h1>
                <p>Broj Postera</p>
            </div>
        </div>
    </div>

@endsection