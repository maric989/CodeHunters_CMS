@extends('admin.index')


@section('content')

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Example</th>
            <th scope="col">User</th>
            <th scope="col">Approved</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($definitions as $definition)
            <tr>

                <th scope="row">{{$definition->id}}</th>
                <td>{{$definition->title}}</td>
                <td>{{$definition->body}}</td>
                <td>{{$definition->example}}</td>
                <td>{{$users->find($definition->user_id)->name}}</td>
                <td>
                    <form method="post" action="{{route('admin.definition.disapproval',$definition->id)}}">
                        {{csrf_field()}}
                        <button class="btn btn-danger">Ponisti</button>
                    </form>
                </td>                <td>
                    <button class="btn btn-success">Show</button>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
@endsection