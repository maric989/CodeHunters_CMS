@extends('admin.index')


@section('content')

    <h1>Users</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nick</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Definicija</th>
                <th>Postera</th>
                <th>Prisutan od:</th>
            </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->role_id)
                            <td>{{$user->role->name}}</td>
                        @else
                            <td>Guest</td>
                        @endif
                        <td>{{count($user->definition->where('user_id','=',$user->id))}}</td>
                        <td>{{count($user->posters->where('user_id','=',$user->id))}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div style="text-align: center">
        {{$users->links()}}
    </div>

@endsection