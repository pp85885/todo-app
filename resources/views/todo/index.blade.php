@extends('layoout.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $key => $todo)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
