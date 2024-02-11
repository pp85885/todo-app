@extends('layoout.app')

@section('content')
    {{-- alert messages --}}
    @include('alertMessage')

    <div class="container mt-2">
        <h3 class="text-center">Todo List</h3>
        <div class="text-end">
            <a href="{{ route('todo.create') }}" class="btn btn-success">Add Todo</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todos as $key => $todo)
                    <tr>
                        <td>{{ $todos->firstItem() + $key }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ \Str::limit($todo->description, 50) }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('todo.edit', $todo->id) }}">Edit</a>
                            {{-- <a class="btn btn-danger" href="{{ route('todo.delete', $todo->id) }}">Delete</a> --}}
                            <form action="{{ route('todo.delete', $todo->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h4>
                        List not found !
                    </h4>
                @endforelse
            </tbody>
        </table>
        <div class="text-end"> {{ $todos->links() }}</div>
    </div>
@endsection
