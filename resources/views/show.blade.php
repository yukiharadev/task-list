@extends('layouts.app')

@section('title', "Task: $task->title")

@section('content')
    <p>{{ $task->title }}</p>
    <p>{{ $task->description }}</p>
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
    <p> {{$task -> completed ? 'Completed': 'Not Completed'}}</p>
    <a href="{{ route('tasks.index') }}">Back</a>
    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
    <div>
        <form action="{{ route('tasks.complete', ['task' => $task]) }}" method="post">
            @csrf
            @method('put')
            <button type="submit">Mark as {{$task->completed ? 'not completed' : "completed" }}</button>
        </form>
    </div>
    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection