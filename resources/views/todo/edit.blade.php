@extends('layoout.app')

@section('content')
    <div class="container mt-3">
        <h3 class="text-center">Edit Todo</h3>
        <div class="text-end">
            <a href="{{ route('todo.index') }}" class="btn btn-success">Todo List</a>
        </div>
        <form method="POST" action="{{ route('todo.update', $todo->id) }}" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $todo->title }}" class="form-control">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" cols="10" rows="3">{{ $todo->description }}</textarea>

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
